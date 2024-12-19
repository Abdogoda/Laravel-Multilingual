<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__("custome.title")}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg py-4 bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">{{__('custome.localization')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">{{__("custome.home")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('custome.about')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__("custome.blog")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('custome.contact')}}</a>
                    </li>
                </ul>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="text-uppercase">{{app()->getLocale()}} </span> <i class="fa fa-language"></i>
                    </a>
                    <ul class="dropdown-menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item {{$localeCode == app()->getLocale() ? 'active' : ''}}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    {{-- section --}}
    <section class="my-4">
        <div class="container shadow p-4">
            <div class="d-flex mb-3 flex-wrap align-items-center justify-content-between">
                <h3>{{__("custome.create_product")}}</h3>
                <a href="{{route("products.index")}}" class="btn btn-success">{{__("custome.all_products")}} <i class="fa fa-eye"></i></a>
            </div>
            <div class="mb-3">
                @session('success')
                    <div class="alert alert-success">{{session("success")}}</div>
                @endsession
            </div>
            <form action="{{route("products.update", $product)}}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="name_{{$localeCode}}">{{__("custome.name_".$localeCode)}}</label>
                                <input class="form-control" type="text" name="name[{{$localeCode}}]" id="name.".$localeCode value="{{$product->getTranslation("name", $localeCode)}}">
                                @error('name.'.$localeCode)
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="category_{{$localeCode}}">{{__("custome.category_".$localeCode)}}</label>
                                <input class="form-control" type="text" name="category[{{$localeCode}}]" id="category.".$localeCode value="{{$product->getTranslation("category", $localeCode)}}">
                                @error('category.'.$localeCode)
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        <div class="form-group mb-3">
                            <label for="price">{{__("custome.price")}}</label>
                            <input class="form-control" type="number" name="price" id="price" min="0" value="{{$product->price}}">
                            @error('price')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{__('custome.save')}}</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>