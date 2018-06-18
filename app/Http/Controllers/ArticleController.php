<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;

class ArticleController extends Controller
{
   
    public function index()
    {
        //

        $articles = Article::paginate(15);


        return ArticleResource::collection($articles);
    }

  
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {

        $article = $request->isMethod('put') ? Article::findOrFail($request->article_id) : new Article;
 
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if($article->save()){
            return new ArticleResource($article);
        }
        return 'fucked up';

    }

  
    public function show($id)
    {
        //
        $article = Article::findOrFail($id);

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        if($article->delete()){
            return 'deleted';
        }
    }
}
