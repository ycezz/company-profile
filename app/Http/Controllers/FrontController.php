<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use App\Models\HeroSection;
use App\Models\OurPrinciple;
use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Testimonial;

class FrontController extends Controller
{
    //
    public function index(){
        $hero_sections = HeroSection::orderbyDesc('id')->take(1)->get();
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $products = Product::take(3)->get();
        $teams = OurTeam::take(7)->get();
        $testimonials = Testimonial::take(4)->get();
        return view('front.index', compact('hero_sections','statistics', 'principles', 'products', 'teams', 'testimonials'));
    }
}
