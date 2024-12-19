<!DOCTYPE html>
<html lang="{{app()->getLocale()}}" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Multi Language</title>
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
                        @foreach (config("app.available_locales") as $locale)
                            <li><a class="dropdown-item {{$locale == app()->getLocale() ? 'active' : ''}}" href="{{route("change-language", $locale)}}">{{__("custome.".$locale)}}</a></li>
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
                <h3>{{__("custome.all_products")}}</h3>
                <a href="{{route("products.create")}}" class="btn btn-success">{{__("custome.create_product")}} <i class="fa fa-plus"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>{{__("custome.name")}}</td>
                            <td>{{__("custome.category")}}</td>
                            <td>{{__("custome.price")}}</td>
                            <td>{{__("custome.action")}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->getTrans("name")}}</td>
                                <td>{{$product->getTrans("category")}}</td>
                                <td>{{$product->price}} {{__("custome.egp")}}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm">{{__("custome.edit")}} <i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm">{{__("custome.delete")}} <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5">There are no data</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>