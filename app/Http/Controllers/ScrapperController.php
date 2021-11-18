<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ScrappedProduct;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Mail;
class ScrapperController extends Controller {

    public function product_list(){
         $menu_item = array(
            'parent_menu'=>'scrap_product',
            'child'=>''
        );
        $products = \App\Models\ItemInfo::paginate(20);
        return view('scrapp.index',compact('products','menu_item'));
    }

    
    public function post_log(){
        $post_logs = \App\Models\ApiPostLog::latest()->paginate(20);
        $menu_item = array(
            'parent_menu'=>'post_log',
            'child'=>''
        );
        return view('scrapp.post_log', compact('post_logs','menu_item'));
    }

    public function scrapp_delete($id = 0){
        $product = ScrappedProduct::find($id);
        if(!$product){
            abort(404);
        }
        $product->delete();
        return redirect()->back()->with('success', 'Successfully saved');
    }

    public function scrapp(Request $request) {
        $this->validate($request, [
            'link' => 'required',
        ]);
        $link = $request->link;
        if (isset($link)) {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $link);
            
            $domain = $this->getDomain($link);
            $node_setting = \App\Models\NodeSetting::where('domain',$domain)->first(); 
            
            $data = $crawler->filter($node_setting->node)->each(function ($node)  {


                if ($node->getNode(0)->nodeName == 'h1') {
                    $data['product_title'] = $node->text();
                } else if ($node->getNode(0)->nodeName == 'span') {
                    $data['price'] = $node->text();
                } else if ($node->getNode(0)->nodeName == 'img') {
                    $data['image'] =  $node->getNode(0)->getAttribute('src') ;
                } else {
                    $data['data'] = $node->text();
                }

            return $data;
                
            });
             $text = '';
            $image = '';
            $product_title = 'No Title';
            $price = 0;
            
            
            foreach ($data as $value) {

                if (isset($value['image'])) {
                    $image = $value['image'];
                } elseif (isset($value['product_title'])) {

                    $product_title = $value['product_title'];
                } elseif (isset($value['price'])) {
                    $price = $value['price'];
                } else {
                    
                }
            }
            $item = new \App\Models\ItemInfo();
            $item->title = $product_title;
            $item->price = $price;
            $item->image_link = $image;
            $item->link = $link;
            $item->save();
            return redirect()->back()->with('success','Successfully Saved');
            
            
        } else {
            return 0;
        }
    }
    public function scrap_product_delete($id){
        $item = \App\Models\ItemInfo::find($id)->delete();
        return redirect()->back()->with('success','Successfully Deleted');
    }

    public function scrapp_walmart($link = null) {
        if (isset($link)) {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $link);
            
            $domain = $this->getDomain($link);
            $node_setting = \App\Models\NodeSetting::where('domain',$domain)->first(); 
            
            $data = $crawler->filter($node_setting->node)->each(function ($node)  {


                if ($node->getNode(0)->nodeName == 'h1') {
                    $data['product_title'] = $node->text();
                } else if ($node->getNode(0)->nodeName == 'span') {
                    $data['price'] = $node->text();
                } else if ($node->getNode(0)->nodeName == 'img') {
                    $data['image'] =  $node->getNode(0)->getAttribute('src') ;
                } else {
                    $data['data'] = $node->text();
                }


                return $data;
            });

            return $data;
        } else {
            return 0;
        }
    }

    public function scrapp_reliancedigital($link = null) {
        if (isset($link)) {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $link);

            $data = $crawler->filter('.pdp__offerPrice')->each(function ($node) {
                return $node->text();
            });

            foreach ($data as $value) {

                $price = $this->getNumber($value);
                return $price;
            }
        } else {
            return 0;
        }
    }
    public function scrapp_fotocentreindia($link = null) {
        if (isset($link)) {
            $client = new Client(HttpClient::create(['timeout' => 60]));
            $crawler = $client->request('GET', $link);

            $data = $crawler->filter('.product-details-wrapper .woocommerce-Price-amount bdi')->each(function ($node) {
                return $node->text();
            });
            $prices = array();
            foreach ($data as $value) {

                $price[] = $this->getNumber($value);
            }
            return min($price);
        } else {
            return 0;
        }
    }
    
    public function test_scrap(){
        echo '<pre>';
        $data = $this->scrapp_walmart('https://www.petco.com/shop/en/petcostore/product/merry-makings-sleigh-all-day-ped-bed');
       
        var_dump($data);
    }

    public function getNumber($value) {
        $value = preg_replace("/[^0-9\.]/", '', $value);
        return $value;
    }

    public function cron_job() {
        $last_row = \App\Models\OperationRow::first();

        $product_list = ScrappedProduct::skip($last_row->last_id)->take(20)->get();

        foreach ($product_list as $product) {
            $amazon_price = $this->scrapp_amazon($product->amazon_link);
            $flipcart_price = $this->scrapp_flipcart($product->flipcart_link);
            $futureforward_price = $this->scrapp_futureforward($product->futureforward_link);
            $fotocentreindia_price = $this->scrapp_fotocentreindia($product->fotocentreindia_link);
             $imastudent_price = $this->scrapp_imastudent($product->imastudent_link);
            $mdcomputer_price = $this->scrapp_mdcomputer($product->mdcomputer_link);
            $nationalpc_price = $this->scrapp_nationalpc($product->nationalpc_link);
            
            
            $product_price = \App\Models\ProductPrice::where('product_id', $product->id)->first();
            if ($product_price) {
                $product_price->amazon_price = $amazon_price;
                $product_price->flipcart_price = $flipcart_price;
                $product_price->futureforward_price = $futureforward_price;
                $product_price->fotocentreindia_price = $fotocentreindia_price;
                $product_price->imastudent_price = $imastudent_price;
                $product_price->nationalpc_price = $nationalpc_price;
                $product_price->mdcomputer_price = $mdcomputer_price;
            } else {
                $product_price = new \App\Models\ProductPrice();
                $product_price->amazon_price = $amazon_price;
                $product_price->flipcart_price = $flipcart_price;
                $product_price->futureforward_price = $futureforward_price;
                $product_price->fotocentreindia_price = $fotocentreindia_price;
                $product_price->imastudent_price = $imastudent_price;
                $product_price->nationalpc_price = $nationalpc_price;
                $product_price->mdcomputer_price = $mdcomputer_price;
                $product_price->product_id = $product->id;
            }
            $product_price->save();
            $last_id = $product->id;
            
        }
        $total_product = ScrappedProduct::count();
        if ($total_product <= $last_id) {
            $last_row->last_id = 0;
            $last_row->save();
        } else {
            $last_row->last_id = $last_id;
            $last_row->save();
        }
        $details = array(
            'from_email' =>env('MAIL_USERNAME'),
            'to_email'=>env('TO_MAIL')
        );
        $data = array('z'=>1);
         Mail::to(env('TO_MAIL'))->send(new \App\Mail\CronjobMail());
    }

    public function update_price($id = 0) {
        $product = ScrappedProduct::find($id);
        if ($product) {
            $amazon_price = $this->scrapp_amazon($product->amazon_link);
            $flipcart_price = $this->scrapp_flipcart($product->flipcart_link);
            $futureforward_price = $this->scrapp_futureforward($product->futureforward_link);
            $fotocentreindia_price = $this->scrapp_fotocentreindia($product->fotocentreindia_link);
            $imastudent_price = $this->scrapp_imastudent($product->imastudent_link);
            $mdcomputer_price = $this->scrapp_mdcomputer($product->mdcomputer_link);
            $nationalpc_price = $this->scrapp_nationalpc($product->nationalpc_link);

            $product_price = \App\Models\ProductPrice::where('product_id', $product->id)->first();
            if ($product_price) {
                $product_price->amazon_price = $amazon_price;
                $product_price->flipcart_price = $flipcart_price;
                $product_price->futureforward_price = $futureforward_price;
                $product_price->fotocentreindia_price = $fotocentreindia_price;
                $product_price->imastudent_price = $imastudent_price;
                $product_price->nationalpc_price = $nationalpc_price;
                $product_price->mdcomputer_price = $mdcomputer_price;
                $product_price->save();
            } else {
                $product_price = new \App\Models\ProductPrice();
                $product_price->amazon_price = $amazon_price;
                $product_price->flipcart_price = $flipcart_price;
                $product_price->futureforward_price = $futureforward_price;
                $product_price->fotocentreindia_price = $fotocentreindia_price;
                $product_price->imastudent_price = $imastudent_price;
                $product_price->nationalpc_price = $nationalpc_price;
                $product_price->mdcomputer_price = $mdcomputer_price;
                $product_price->product_id = $product->id;
                $product_price->save();
            }

            return redirect()->back()->with('success', 'Successfully updated');
        }
    }
    
    public function test(){
      $data =   $this->scrapp_mdcomputer('https://mdcomputers.in/ekwb-ek-cryofuel-solid-scarlet-red.html');
      var_dump($data);
    }
    
    public function test_email(){
        $menu_item = array(
            'parent_menu'=>'dashboard',
            'child'=>''
        );
         return view('test_email',  compact('menu_item'));
    }
    public function send_email(Request $request){
        Mail::to(env('TO_MAIL'))->send(new \App\Mail\TestMail());
        return redirect()->back()->with('success', 'Successfully send');
    }
    
    public function getDomain($link) {
        $parse = parse_url($link);
        $host = $parse['host'];
        $host = str_ireplace('www.', '', $host);
        return $host;
    }


}
