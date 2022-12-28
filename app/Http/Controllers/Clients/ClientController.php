<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Libraries\Database;
use App\Libraries\Http;

class ClientController extends Controller
{
    public function load()
    {
        $clients = Database::getInstance()->select('clients', '*');

        return response()->json([
            'clients' => $clients
        ]);
    }

    public function create()
    {
        $data = input()->all([
            'name', 'email', 'description'
        ]);


        $client = Database::getInstance()->select('clients', '*', [
            'email' => $data['email']
        ])[0] ?? null;
        if ($client !== null) {
            return response()
                ->httpCode(Http::BAD_REQUEST)
                ->json([
                    'message' => 'Cliente já cadastrado'
                ]);
        }

        Database::getInstance()->insert('clients', $data);
        $client = Database::getInstance()->select('clients', '*', [
            'email' => $data['email']
        ])[0] ?? null;

        return response()->json([
            'client' => $client
        ]);
    }

    public function update(int $id)
    {
        $client = Database::getInstance()->select('clients', '*', [
            'id' => $id
        ])[0] ?? null;

        if ($client === null) {
            return response()
                ->httpCode(Http::NOT_FOUND)
                ->json([
                    'message' => 'Usuário não encontrado'
                ]);
        }

        return response()->json([
            'client' => $client
        ]);
    }

    public function store(int $id)
    {
        $data = input()->all([
            'name', 'description'
        ]);

        Database::getInstance()->update('clients', $data, [
            'id' => $id
        ]);

        $client = Database::getInstance()->select('clients', '*', [
            'id' => $id
        ])[0] ?? null;
        if ($client === null) {
            return response()
                ->httpCode(Http::NOT_FOUND)
                ->json([
                    'message' => 'Usuário não encontrado'
                ]);
        }

        return response()->json([
            'client' => $client
        ]);
    }

    public function delete(int $id)
    {
        Database::getInstance()->delete('clients', [
            'id' => $id
        ]);

        return response()->json([
            'message' => 'Cliente removido com sucesso!'
        ]);
    }
}
