<?php
namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
class SliderController extends Controller
{
    public function index(Request $request)
    {

        return inertia('Components/SliderComponent');

    }
}
