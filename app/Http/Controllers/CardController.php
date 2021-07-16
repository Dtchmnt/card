<?php

namespace App\Http\Controllers;

use App\Models\Media;
use JeroenDesloovere\VCard\VCard;
use Illuminate\Http\Request;


/**
 * @file
 * A class to generate vCards for contact data.
 */

class CardController extends Controller
{
    public function downloadVcard(Request $request, $id)
    {

        $media = Media::find($id);

        $vcard = new VCard();

        // define variables
        $lastname = $media['last_name'];
        $firstname = $media['first_name'];
        $additional = '';
        $prefix = '';
        $suffix = '';

        // add personal data
        $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);

        // add work data
        $vcard->addEmail($media['email']);
        $vcard->addPhoneNumber($media['phone'], 'PREF;WORK');
        $vcard->addURL($media['telegram']);
        $vcard->addURL($media['instagram']);
        $vcard->addURL($media['facebook']);
        $vcard->addURL($media['in']);

        //$vcard->addPhoto(__DIR__ . '/landscape.jpeg');

        // return vcard as a string
        //return $vcard->getOutput();

        // return vcard as a download
        return $vcard->download();
    }
}
