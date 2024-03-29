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
    public function home(): Factory|View|Application
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
    public function signatures(Request $request): Factory|View|Application
    {
        $signatures = Signature::confirmed()->paginate(
            $request->get('perPage') ?? 10,
            ['first_name', 'last_name'],
            'page',
            $request->get('page')
        );

        return view('signatures', [
            'signatures' => $signatures,
            'count' => Signature::count(),
        ]);
    }

    /**
     * Handle the signing form submission.
     *
     * @param StoreSignature $request
     * @return Application|RedirectResponse|Redirector
     */
    public function sign(StoreSignature $request): Redirector|RedirectResponse|Application
    {
        // Register the signature
        $signature = Signature::create($request->validated());

        // Initiate the verification procedure
        event(new Signed($signature));

        return redirect()->route('home')
            ->with('success', Lang::get('form.success'));
    }

    /**
     * Handle the email address verification.
     *
     * @param SignatureVerificationRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function verify(SignatureVerificationRequest $request): Redirector|Application|RedirectResponse
    {
        $request->fulfill();

        return redirect()->route('signatures')
            ->with('success', Lang::get('verify.success'));
    }
}
