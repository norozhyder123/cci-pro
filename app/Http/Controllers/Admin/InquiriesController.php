<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class InquiriesController extends Controller
{
    //

    public function index()
    {

    	$contacts = Contact::all();

    	return view('admin.adminView.inquiries',compact('contacts'));
    	# code...
    }
}
