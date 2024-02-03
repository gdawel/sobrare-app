<?php

namespace App\Http\Controllers;

use App\Mail\Contato;
use Filament\Http\Controllers\RedirectToHomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContatoController extends Controller
{
    public function enviar (Request $request) 
    {

        Mail::to('faleconosco@sobrare.com.br', 'Site SOBRARE - Contato')->send(new Contato([
            'fromName' => $request->input('fullname'),
            'fromEmail' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),

            ]
        ));
        session()->flash('status', 'Mensagem enviada com sucesso! Responderemos em até 24 horas.');
        return redirect()->to(url()->previous() . '#support');
    }
}
