<?php

namespace App\Http\Controllers;

use App\Events\Signed;
use App\Http\Requests\SignatureVerificationRequest;
use App\Http\Requests\StoreSignature;
use App\Models\Signature;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Lang;
use Illuminate\View\View;

class FrontendController extends Controller
{
    /**
     * Display the homepage.
     *
     * @return Application|Factory|View
     */
    public function home()
    {
        $count = Signature::count();

        return view('index', ['count' => $count]);
    }

    /**
     * Display the signatures page.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function signatures(Request $request)
    {
        $page = $request->get('page') > 0 ? $request->get('page') : 1;
        $perPage = $request->get('perPage') > 0 ? $request->get('perPage') : 15;
        $nbConfirmed = Signature::confirmed()->count();
        $last = floor($nbConfirmed / $perPage);
        $last !== 0 ?: $last++;

        $signatures = Signature::confirmed()->paginate($perPage);

        return view('signatures', [
            'signatures' => $signatures,
            'count' => Signature::count(),
            'page' => $page,
            'last' => $last,
        ]);
    }

    /**
     * Handle the signing form submission.
     *
     * @param StoreSignature $request
     * @return Application|RedirectResponse|Redirector
     */
    public function sign(StoreSignature $request)
    {
        $signature = Signature::create($request->validated()); // Register the signature

        event(new Signed($signature)); // Initiate the verification procedure

        return redirect('/')->with('success', Lang::get('form.success'));
    }

    /**
     * Handle the email address verification.
     *
     * @param SignatureVerificationRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function verify(SignatureVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/signatures')->with('success', Lang::get('verify.success'));
    }
}
