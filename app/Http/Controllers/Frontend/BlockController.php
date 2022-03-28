<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Component;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function show(Component $component, Block $block)
    {
        return view('main.blocks.show', compact('component', 'block'));
    }
}
