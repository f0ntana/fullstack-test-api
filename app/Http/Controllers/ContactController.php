<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Contact Repository Variable
     *
     * @var string
     */
    private $contactRepository;

    /**
     * Construct Contact Controller Function
     *
     * @param ContactRepository $contactRepository
     */
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Index Contact Controller Function
     *
     * @return Contact $contacts
     */
    public function index()
    {
        try {
            $contacts = $this->contactRepository->fetchAll();
        } catch (Exception $e) {
            return response()->json($e, 500);
        }

        return response()->json($contacts, 200);
    }

    /**
     * Store Contact Controller Function
     * @param ContactRequest $request
     * @return Contact $contacts
     */
    public function store(ContactRequest $request)
    {
        try {
            $contacts = $this->contactRepository->create($request->all());
        } catch (Exception $e) {
            return response()->json($e, 500);
        }

        return response()->json($contacts, 200);
    }
}
