<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class AuthorController extends Controller
{
	public function author(Request $request, Response $response, $args = [])
    {
    	$author = $this->ci->get('db')->find('App\Entity\Author', $args['id']);

    	if (!$author) {
            throw new HttpNotFoundException($request);
        }


        return $this->renderPage($response, 'author.html', [
        	'author' => $author,
            'articles' => $author->getArticles()
        ]);
    }
}