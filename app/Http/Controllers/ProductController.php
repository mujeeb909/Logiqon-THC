<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Tag;
use App\Models\User;
use App\Models\Plans;
use App\Models\Product;
use App\Models\Category;
use App\Models\Enquiries;
use App\Models\PlanHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function contactPage()
    {
        $enquiries = Enquiries::where('user_id', Session::get('user_id'))->get();

        return view('admin.products.create', ['enquiries' => $enquiries]);
    }



    public function index()
    {

        $plansMonthly = Plans::where('duration', 'monthly')->get();
        $plansYearly = Plans::where('duration', 'yearly')->get();

        $userId = Session::get('user_id');
        $user = User::find($userId);
        $currentPlanId = $user->plan_id;
        $currentPlan = Plans::where('id', $currentPlanId)->first();

        // $planHistory = PlanHistory::where('user_id', $userId)->get();

        // $planHistory = PlanHistory::join('plans', 'plan_history.plan_id', '=', 'plans.id')
        //     ->where('plan_history.user_id', $userId)
        //     ->select('plan_history.*', 'plans.name as plan_name', 'plans.duration as plan_duration')
        //     ->get();

        $planHistory = PlanHistory::with('plan')->where('user_id', $userId)->get();

        return view('admin.products.index', ['plansMonthly' => $plansMonthly, 'plansYearly' => $plansYearly, 'currentPlan' => $currentPlan, 'planHistory' => $planHistory]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $products = Product::with('category')->orderBy('id');

        if (!empty($search) && !is_numeric($search)) {
            $products = $products->where('name', 'LIKE', '%' . $search . '%');
        }

        if (!empty($search) && is_numeric($search)) {
            $products = $products->where('price', $search);
        }

        $products = $products->get();

        return view('admin.ajex.ajex-product-search', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create(Request $request)
    // {
    //     $categories = Category::whereNull('parent_id')->with('children')->orderBy('id')->get();
    //     $id = Session::get('user_id');
    //     $enquiries = Enquiries::where('user_id', $id)->get();
    //     return view('admin.products.create', compact('enquiries'));
    // }









    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'product_name' => 'required',
            'price' => 'required',
            'category' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('addProducts')->withInput()->with(['status' => 'danger', 'message' => $validator->errors()->first()]);
        }
        try {
            $product = new Product();
            $product->name = $request->product_name;
            $product->price = $request->price;
            $product->category_id = $request->category;
            $product->save();

            // Return success status and message
            return response()->json([
                'status' => 'success',
                'message' => 'Product stored successfully.',
            ]);
        } catch (\Exception $e) {
            // Return error status and message

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function deleteSelectedRows(Request $request)
    {
        // Get the IDs of selected rows from the request
        $ids = $request->input('ids');


        Enquiries::whereIn('id', $ids)->delete();

        // Return a response indicating success
        return response()->json(['message' => 'Selected rows deleted successfully']);
    }

    public function changePassword(Request $request)
    {
        $userId = Session::get('user_id');
        $user = User::find($userId);

        $activePage = 'setting-change-password';

        return view('admin.dashboard_change_passoword', ['user' => $user, 'activePage' => $activePage]);

    }

    public function validateCurrentPassword(Request $request)
    {
        $userId = Session::get('user_id');
        $user = User::findOrFail($userId);

        // Validate the current password
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password updated successfully.']);
        } else {
            // Current password does not match
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.']);
        }
    }


    public function profilePage()
    {
        $userId = Session::get('user_id');
        $userData = User::where('id', $userId)->first();
        $tags = Tag::where('user_id', $userId)->get();
        return view('admin.dashboard_profile_page', ['userData' => $userData, 'tags' => $tags]);
    }
}
