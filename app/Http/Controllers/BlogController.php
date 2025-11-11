<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogMst;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
  //
  public function blogList()
  {
    return response()->json(BlogMst::paginate(10));
  }

  public function getBlogById($id)
  {
    // Try to find the blog by ID
    $blog = BlogMst::where('blog_id', $id)->where('is_approved', 'yes')->first();


    // If not found, return 404
    if (!$blog) {
      return response()->json(['error' => 'Blog not found'], 404);
    }

    // Otherwise return the record
    return response()->json($blog);
  }


  // public function addBlog(Request $request)
  // {
  //   // 1️⃣ Validation
  //   $validator = Validator::make($request->all(), [
  //     'website_name' => 'required|string|max:255',
  //     'site_url' => 'required|url',
  //     'website_niche' => 'nullable|string|max:255',
  //     'moz_da' => 'nullable|numeric',
  //     'ahrefs_dr' => 'nullable|numeric',
  //     'ahrefs_traffic' => 'nullable|numeric',
  //     'semrush_traffic' => 'nullable|numeric',
  //     'general_guest_post_price' => 'nullable|numeric',
  //     'general_link_insertion_price' => 'nullable|numeric',
  //     'sensitive_guest_post_price' => 'nullable|numeric',
  //     'sensitive_link_insertion_price' => 'nullable|numeric',
  //     'contact_email_id' => 'nullable|email',
  //     'facebook_profile_url' => 'nullable|url',
  //     'role' => 'nullable|string|max:255',
  //     'outrech_from' => 'nullable|string|max:255',
  //     'comment' => 'nullable|string',
  //     'added_by' => 'nullable|string|max:255',
  //     'general_guest_post_selling_price' => 'nullable|numeric',
  //     'general_link_insertion_selling_price' => 'nullable|numeric',
  //     'sensitive_guest_post_selling_price' => 'nullable|numeric',
  //     'sensitive_link_insertion_selling_price' => 'nullable|numeric',
  //   ]);

  //   if ($validator->fails()) {
  //     return response()->json(['errors' => $validator->errors()], 422);
  //   }

  //   // 2️⃣ Create and save blog record
  //   $blog = new BlogMst();
  //   $blog->website_name = $request->website_name;
  //   $blog->site_url = $request->site_url;
  //   $blog->website_niche = $request->website_niche;
  //   $blog->moz_da = $request->moz_da;
  //   $blog->ahrefs_dr = $request->ahrefs_dr;
  //   $blog->ahrefs_traffic = $request->ahrefs_traffic;
  //   $blog->semrush_traffic = $request->semrush_traffic;
  //   $blog->general_guest_post_price = $request->general_guest_post_price;
  //   $blog->general_link_insertion_price = $request->general_link_insertion_price;
  //   $blog->sensitive_guest_post_price = $request->sensitive_guest_post_price;
  //   $blog->sensitive_link_insertion_price = $request->sensitive_link_insertion_price;
  //   $blog->contact_email_id = $request->contact_email_id;
  //   $blog->facebook_profile_url = $request->facebook_profile_url;
  //   $blog->role = $request->role;
  //   $blog->outrech_from = $request->outrech_from;
  //   $blog->comment = $request->comment;
  //   $blog->added_by = $request->added_by;
  //   $blog->status = 0;
  //   $blog->is_approved = 'no';
  //   $blog->created_on = now();
  //   $blog->general_guest_post_selling_price = $request->general_guest_post_selling_price;
  //   $blog->general_link_insertion_selling_price = $request->general_link_insertion_selling_price;
  //   $blog->sensitive_guest_post_selling_price = $request->sensitive_guest_post_selling_price;
  //   $blog->sensitive_link_insertion_selling_price = $request->sensitive_link_insertion_selling_price;


  //   $blog->save();
  //   print_r($blog);  die;

  //   // 3️⃣ Return success response
  //   return response()->json([
  //     'message' => 'Blog added successfully',
  //     'blog_id' => $blog->id,
  //     'data' => $blog
  //   ], 201);
  // }

  public function addBlog(Request $request)
  {
    try {
      // ✅ Validation rules
      $validator = Validator::make($request->all(), [
        'website_name' => 'required|string|max:255',
        'site_url' => 'required|url',
        'website_niche' => 'nullable|string|max:255',
        'moz_da' => 'nullable|numeric',
        'ahrefs_dr' => 'nullable|numeric',
        'ahrefs_traffic' => 'nullable|numeric',
        'semrush_traffic' => 'nullable|numeric',
        'general_guest_post_price' => 'nullable|numeric',
        'general_link_insertion_price' => 'nullable|numeric',
        'sensitive_guest_post_price' => 'nullable|numeric',
        'sensitive_link_insertion_price' => 'nullable|numeric',
        'contact_email_id' => 'nullable|email',
        'facebook_profile_url' => 'nullable|url',
        'role' => 'nullable|string|max:255',
        'outrech_from' => 'nullable|string|max:255',
        'comment' => 'nullable|string',
        'added_by' => 'nullable|string|max:255',
        'general_guest_post_selling_price' => 'nullable|numeric',
        'general_link_insertion_selling_price' => 'nullable|numeric',
        'sensitive_guest_post_selling_price' => 'nullable|numeric',
        'sensitive_link_insertion_selling_price' => 'nullable|numeric',
      ]);

      if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
      }

      // ✅ Create and save blog record
      $blog = new BlogMst();
      $blog->website_name = $request->website_name;
      $blog->site_url = $request->site_url;
      $blog->website_niche = $request->website_niche;
      $blog->moz_da = $request->moz_da;
      $blog->ahrefs_dr = $request->ahrefs_dr;
      $blog->ahrefs_traffic = $request->ahrefs_traffic;
      $blog->semrush_traffic = $request->semrush_traffic;
      $blog->general_guest_post_price = $request->general_guest_post_price;
      $blog->general_link_insertion_price = $request->general_link_insertion_price;
      $blog->sensitive_guest_post_price = $request->sensitive_guest_post_price;
      $blog->sensitive_link_insertion_price = $request->sensitive_link_insertion_price;
      $blog->contact_email_id = $request->contact_email_id;
      $blog->facebook_profile_url = $request->facebook_profile_url;
      $blog->role = $request->role;
      $blog->outrech_from = $request->outrech_from;
      $blog->comment = $request->comment;
      $blog->added_by = $request->added_by;
      $blog->created_by = '';
      $blog->status = 0;
      $blog->is_approved = 'no';
      $blog->created_on = now(); // ✅ use created_at, not created_on
      $blog->updated_by = '';
      $blog->updated_on = now();
      $blog->general_guest_post_selling_price = $request->general_guest_post_selling_price;
      $blog->general_link_insertion_selling_price = $request->general_link_insertion_selling_price;
      $blog->sensitive_guest_post_selling_price = $request->sensitive_guest_post_selling_price;
      $blog->sensitive_link_insertion_selling_price = $request->sensitive_link_insertion_selling_price;
      $blog->save();

      return response()->json([
        'message' => 'Blog added successfully',
        'blog_id' => $blog->blog_id ?? $blog->id,
        'data' => $blog
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'error' => $e->getMessage(),
        'line' => $e->getLine()
      ], 500);
    }
  }
}
