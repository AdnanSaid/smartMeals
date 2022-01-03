@extends('layouts.app')

@section('content')

    <html>

    <head>

    </head>

    <body>

    <div class="container">

        <form action="/r" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="form-group row">
                        <h1>Edit Recipe</h1>
                    </div>

                    <div class="form-group row">

                        <label for="caption" class="col-md-4 col-form-label">Title</label>

                        <input id="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title"
                               value="{{ old('title' . $recipe->title, 'Default') }}"
                               autocomplete="title" autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">

                        <label for="caption" class="col-md-4 col-form-label">Description</label>

                        <textarea id="description"
                                  class="form-control"
                                  name="description"
                                  placeholder="Lets cut to the cheese"
                                  value="{{ old('description') ?? $recipe->description }}"
                                  autocomplete="description" autofocus>
                        </textarea>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group row">

                        <label for="image" class="col-md-4 col-form-label">Post Image</label>

                        <input id="image"
                               type="file"
                               class="form-control-file"
                               name="image"
                               autocomplete="image" autofocus>

                        @if ($errors->has('image'))
                            <strong>{{ $errors->first('image') }}</strong>
                        @endif

                    </div>

                    <div class="form-group row">

                        <label for="caption" class="col-md-4 col-form-label">Tags</label>

                        <select id="subcategories_id"
                                class="form-control"
                                name="subcategories_id"
                                value="{{old('description') ?? $recipe->subcategories_id }}"
                                autocomplete="subcategories_id" autofocus>

                            <option >--Select Tags--</option>

                            @foreach($subcategories as $subcategory)
                                <option value="{{ $subcategory -> id}}"> {{ $subcategory -> name }}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('tags'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group row">

                        <label for="caption" class="col-md-4 col-form-label">Ingredients</label>

                        <textarea id="ingredients"
                                  class="form-control"
                                  name="ingredients"
                                  placeholder="Separate ingredients by commas"
                                  value="{{old('ingredients') ?? $recipe->ingredients }}"
                                  autocomplete="ingredients" autofocus>
                        </textarea>

                        @if ($errors->has('ingredients'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ingredients') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="form-group row">

                        <label for="caption" class="col-md-4 col-form-label">Method</label>

                        <textarea id="steps"
                                  class="form-control"
                                  name="steps"
                                  placeholder="Describe how the recipe should be cooked"
                                  value="{{old('steps') ?? $recipe->steps }}"
                                  autocomplete="steps" autofocus>
                        </textarea>

                        @if ($errors->has('steps'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('steps') }}</strong>
                        </span>
                        @endif

                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Edit Recipe</button>
                    </div>

                </div>
            </div>

        </form>
    </div>

    </body>

    </html>

@endsection
