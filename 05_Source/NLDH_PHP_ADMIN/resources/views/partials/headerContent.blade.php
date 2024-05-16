<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $titleContent }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route($link) }}">{{ $page }}</a></li>
                    <li class="breadcrumb-item active">{{ $titleContent }}</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
