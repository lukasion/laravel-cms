<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\NewsletterEmail;
use App\Models\NewsletterStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function sign(Request $request)
    {
        if (NewsletterEmail::where('email', $request->email)->count() !== 0) {
            return redirect(route('index'))
                ->with('warning', 'Taki adres e-mail znajduje się już w bazie mailingowej.');
        } else {

            Mail::raw('Hi, welcome user!', function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('temat przykladowy');
            });

            // $newsletterObj = new NewsletterEmail();
            // $newsletterObj->email = $request->email;
            // $newsletterObj->save();

            return redirect(route('index'))
                ->with('info', 'Takk for at du abonnerer på nyhetsbrevet. <br /><span style="font-weight: 600;">En bekreftelsesforespørsel er sendt til din e-postadresse.</span>');
        }
    }

    public function addForm(Request $request)
    {
        $statuses = NewsletterStatus::all();

        return view('newsletter.form', compact('statuses'));
    }

    public function editForm(Request $request, int $newsletterID)
    {
        $newsletter = Newsletter::find($newsletterID);
        $statuses = NewsletterStatus::all();

        return view('newsletter.form', compact('newsletter', 'statuses'));
    }

    public function add(Request $request)
    {
        if (!empty($request->name) && !empty($request->time) && !empty($request->date) && !empty($request->status_id)) {
            $startDatetime = Carbon::parse($request->date . ' ' . $request->time);

            $newsletterObj                  = new Newsletter();
            $newsletterObj->name            = $request->name;
            $newsletterObj->status_id       = $request->status_id;
            $newsletterObj->start_datetime  = $startDatetime->isValid() ? $startDatetime->format('Y-m-d H:i:s') : null;
            $newsletterObj->content         = $request->content;

            if ($newsletterObj->save()) {
                return redirect(route('newsletterList'))
                    ->with('info', 'Kampanjen er opprettet.');
            }
        }
    }

    public function edit(Request $request, int $newsletterID)
    {
        if (!empty($request->name) && !empty($request->time) && !empty($request->date) && !empty($request->status_id)) {
            $startDatetime = Carbon::parse($request->date . ' ' . $request->time);
            
            $newsletterObj = Newsletter::find($newsletterID);
            $newsletterObj = !empty($newsletterObj) ? $newsletterObj : new Newsletter();
            $newsletterObj->name            = $request->name;
            $newsletterObj->status_id       = $request->status_id;
            $newsletterObj->start_datetime  = $startDatetime->isValid() ? $startDatetime->format('Y-m-d H:i:s') : null;
            $newsletterObj->content         = $request->content;
            
            if ($newsletterObj->save()) {
                return redirect(route('newsletterList'))
                    ->with('info', 'Kampanjen er redigert på riktig måte.');
            }
        }
    }

    public function list(Request $request)
    {
        $newsletters = Newsletter::with('status')->get();

        return view('newsletter.list', compact('newsletters'));
    }
}
