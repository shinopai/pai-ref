<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePhotos;
use App\User;
use App\Photo;
use App\Category;
use App\Location;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PhotosController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only(['create']);
    }
    public function index(){
        return view('photos.index');
    }

    public function create(User $user){
        $categories = Category::all();
        $locations = Location::all();

        return view('photos.create')->with([
            'user' => $user,
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    public function store(StorePhotos $request, User $user){
        $image_path = $request->file('image_path')->store('public/post_images/');

        $user->photos()->create([
            'title' => $request->input('title'),
            'image_path' => basename($image_path),
            'caption' => $request->input('caption'),
            'category_id' => $request->input('category_id'),
            'location_id' => $request->input('location_id')
        ]);

        return redirect('/')->with('flash', '新しい写真を投稿しました');
    }

    public function showSearch(){
        $photos = Photo::orderBy('id', 'desc')->limit(50)->get();
        $categories = Category::all();
        $categories->load('photos');
        $locations = Location::all();

        return view('photos.search')->with([
            'photos' => $photos,
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    public function showAll(){
        $photos = Photo::orderBy('id', 'desc')->paginate(100);
        $categories = Category::all();
        $categories->load('photos');
        $locations = Location::all();

        return view('photos.all_photos')->with([
            'photos' => $photos,
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    public function getSearchResult(Request $request){
        $categories = Category::all();
        $categories->load('photos');
        $locations = Location::all();

        $category_id = $request->input('category_id');
        $location_id = $request->input('location_id');
        $keyword = $request->input('keyword');
        $category_name = '検索無し';
        $location_name = '検索無し';
        $search_keyword = '検索無し';

        $query = Photo::query();

        if($category_id != 'null'){
            $query->where('category_id', $category_id);
            $category_name = Category::where('id', $category_id)->value('name');
        }

        if($location_id != 'null'){
            $query->where('location_id', $location_id);
            $location_name = Location::where('id', $location_id)->value('location');
        }

        if(isset($keyword)){
            $query->where('title', 'like', '%'.$keyword.'%')->orWhere('caption', 'like', '%'.$keyword.'%');
            $search_keyword = $request->input('keyword');
        }

        $photos = $query->paginate(50);

        return view('photos.search_result')->with([
            'photos' => $photos,
            'categories' => $categories,
            'locations' => $locations,
            'category_name' => $category_name,
            'location_name' => $location_name,
            'search_keyword' => $search_keyword
        ]);
    }

    public function getPhotosEachCategory(Category $category){
        $categories = Category::all();
        $categories->load('photos');
        $locations = Location::all();
        $photos = Photo::where('category_id', $category->id)->orderBy('id', 'desc')->paginate(100);
        $category_name = $category->name;

        return view('photos.photos_each_category')->with([
            'photos' => $photos,
            'category_name' => $category_name,
            'categories' => $categories,
            'locations' => $locations
        ]);
    }
}
