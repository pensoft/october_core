<?php

/**
 * Created by PhpStorm.
 * User: Christoph Heich
 * Date: 02.06.2018
 * Time: 22:28
 */

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ChristophHeich\Calendar\Models\Entry;

Route::prefix('api/christophheich/calendar/')->group(function () {

    /**
     * Route for the feed.
     *
     * @return json_array
     */
    Route::get('feed/{count?}/{category?}', function ($count = null, $category = null) {
        return Entry::formatted($count, $category);
    });

    /*
     * Groesser
    Route::get('create', function(Request $request) {
        if ($request->input('key') == "AIzaSyCa4RhzrcIJlv-Sog5T8P726d3DuZQXfFI") {
            //return dd($request->all());

            $drop = new Entry;
            $drop->title = $request->title;
            $drop->start = Carbon::createFromFormat('Y-m-d', $request->input('start'))->toDateTimeString();
            $drop->color = '#' . $request->color;
            $drop->save();
        }
    });

    Route::get('delete', function(Request $request) {
        if ($request->input('key') == "AIzaSyCa4RhzrcIJlv-Sog5T8P726d3DuZQXfFI") {
            Entry::destroy($request->input('id'));
        }
    });
    */

});