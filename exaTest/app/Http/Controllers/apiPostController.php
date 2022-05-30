<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class apiRestController extends Controller {
    // This RESTful API is a standardised JSON API
    // All responses that need a body, are in JSON
    // And all requests that need to send a payload are also in JSON

    public function get($id) {
        // Find the specific resource, HTTP GET verb (domain.com/resource/{id})
        $post = Post::find($id);

        if (!$post) {
            // If can't find post, return HTTP 404 Not Found
            return new JsonResponse(
                ["error" => "Not found"],
                Response::HTTP_NOT_FOUND
            );
        }
        
        // Found, return with HTTP 200 OK
        return new JsonResponse($post->jsonSerialize(), Response::HTTP_OK);
    }

    public function show() : JsonResponse {
        // Find all entries for this resource, HTTP GET verb (domain.com/resource)
        $posts = Post::all();
        // Return with HTTP 200 OK
        return new JsonResponse($posts->jsonSerialize(), Response::HTTP_OK);
    }

    public function create(Request $request) : JsonResponse {
        // create new entry for this resource, HTTP POST verb (domain.com/resource)
        $post = new Post;
        $post->title = $request->get('title');
        $post->extract = $request->get('extract');
        $post->content = $request->get('content');
        $post->expires = $request->get('expires');
        $post->comment = $request->get('comment');
        $post->access = $request->get('access');
        $post->save();

        // Return with HTTP 201 CREATED
        return new JsonResponse(
            $post->jsonSerialize(),
            Response::HTTP_CREATED,
        );
    }

    public function update(Request $request, $id) : JsonResponse {
        // update entry for this resource, HTTP PATCH verb (domain.com/resource/{id})
        $post = Post::find($id);

        if (!$post) {
            // If can't find post, return HTTP 404 Not Found
            return new JsonResponse(
                ["error" => "Not found"],
                Response::HTTP_NOT_FOUND
            );
        }

        // Only update the fields are in the request
        if ($title = $request->get('title')) {
            $post->title = $title;
        }
        if ($extract = $request->get('extract')) {
            $post->extract = $extract;
        }
        if ($content = $request->get('content')) {
            $post->content = $content;
        }
        if ($expires = $request->get('expires')) {
            $post->expires = $expires;
        }
        if ($comment = $request->get('comment')) {
            $post->comment = $comment;
        }
        if ($access = $request->get('access')) {
            $post->access = $access;
        }
        // Save
        $post->save();

        // Updated, return with HTTP 200 OK
        return new JsonResponse($post->jsonSerialize(), Response::HTTP_OK);

    }

    public function delete($id) {
        // delete entry for this resource, HTTP DELETE verb (domain.com/resource/{id})
        $success = Post::destroy($id);

        if (!$success) {
            // If query was not successful, it means resource not found, return HTTP 404 Not Found
            return new JsonResponse(
                ["error" => "Not found"],
                Response::HTTP_NOT_FOUND
            );
        }
        
        // Deleted, return with HTTP 204 NO CONTENT
        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}