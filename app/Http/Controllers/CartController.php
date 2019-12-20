<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Cart; //this is the external github cart library I am using
use Validator;

use App\Size;

class CartController extends Controller
{

    public function index()
    {
        return view('shopping.cart');
    }
    
    
    public function addProduct(Request $request) //Request can get all variables from the form that is submitting
    {
        Cart::setGlobalTax(10); //setting global gst when adding a product or creating a new cart instance

        //$product = Product::find($received_id);//this will NOT work because 'find' works by searching generic 'id' not customised 'item_id'. 
        //..Use where statement instead of find

        $sizeObject = Size::where('sizes.size_code', '=', $request->sizeOptions)
            ->where('sizes.products_item_id', '=', $request->item_id)
            ->get()->first(); //use first, or else it will return an ARRAY of objects.

            //dd($sizeObject);
        $price = $sizeObject->price; //getting the price from size object

        Cart::add($request->item_id, $request->item_name, $request->item_qty, $price, 0, ['size' => $request->sizeOptions]);

        //$cc = Cart::content(); //to view the content of the object
        //dd($cc);

        //sends the query result as selected product to the product view
        return redirect()->intended('/cart'); //if intended is not used, then the url will be add-to-cart even though it is showing cart.
    }


    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }
        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }

    

    public function update(Request $request, $id) //for updating quantity using drop down menu in cart page 
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);
        if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
        }
        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }


    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }


    // public function emptyCart()
    // {
    //     Cart::destroy();
    //     return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    // }

    //for ajax test
    // public function index1()
    // {
    //     $msg = "This is a simple message.";
    //     return response()->json(array('msg' => $msg), 200);
    // }

    public function getPaymentContent($received_paymentSelection)
    {
        //$paymentContentHtmls = "<b>This is a simple message.</b>";
        //$paymentContentHtmls = $received_paymentSelection;

        $visaContent = '<div class="form-group">
            <label for="ccname">Name on Visa Card</label>
            <input type="text" class="form-control" id="ccname" placeholder="John Citizen" name="ccname">
            <span id="ccnameError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="ccnum">Card number</label>
            <input type="text" class="form-control" id="ccnum" placeholder="1111-2222-3333-4444" name="cardnumber">
            <span id="ccnumError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="expmonth">Expiry month</label>
            <input type="text" class="form-control" id="expmonth" placeholder="11" name="expmonth">
            <span id="expmonthError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="expyear">Expiry year</label>
            <input type="text" class="form-control" id="expyear" placeholder="24" name="expyear">
            <span id="expyearError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="352" name="cvv">
            <span id="cvvError" style="color: red; font-weight: normal;"></span>
          </div>';

        $masterContent = '<div class="form-group">
            <label for="ccname">Name on MasterCard</label>
            <input type="text" class="form-control" id="ccname" placeholder="Sarah Twain" name="ccname">
            <span id="ccnameError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="ccnum">Card number</label>
            <input type="text" class="form-control" id="ccnum" placeholder="444-2222-1111-3333" name="cardnumber">
            <span id="ccnumError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="expmonth">Expiry month</label>
            <input type="text" class="form-control" id="expmonth" placeholder="09" name="expmonth">
            <span id="expmonthError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="expyear">Expiry year</label>
            <input type="text" class="form-control" id="expyear" placeholder="24" name="expyear">
            <span id="expyearError" style="color: red; font-weight: normal;"></span>
          </div>
          <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" placeholder="897" name="cvv">
            <span id="cvvError" style="color: red; font-weight: normal;"></span>
          </div>';

        $paypalContent = '<br><h5 style="color: grey; text-align: center;">
            Pay with Paypal</h5><br>';

        $cashContent = '<br><h5 style="color: grey; text-align: center;">
            I am paying cash in-store</h5><br>';

        // Send the correct paymentContent to AJAX

        switch ($received_paymentSelection) {
                case "visa":
                $paymentContentHtmls = $visaContent;
                    break;
                case "mastercard":
                $paymentContentHtmls = $masterContent;
                    break;
                case "paypal":
                //This wont work to send a paypal button. 
                //Paypal button contains <script>
                $paymentContentHtmls = $paypalContent;
                    break;
                case "cash":
                $paymentContentHtmls = $cashContent;
                    break;
            }
        

        return response()->json(array('paymentContentHtmls' => $paymentContentHtmls), 200);
    }
    

}
