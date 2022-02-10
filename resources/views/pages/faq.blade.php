@extends('layouts.master')
@section('title', 'FAQ')
@section('content')

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Frequently Asked Question</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pages</a></div>
        <div class="breadcrumb-item">FAQ</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Page 5</h2>
      {{-- Start Card --}}
      <div class="row">
        <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>FAQ Page</h4>
                  </div>
                  <div class="card-body">
                    <div id="accordion">
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                          <h4>Apa itu Delicacy Food?</h4>
                        </div>
                        <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                          <p class="mb-0">
                            Delicacy Food adalah marketplace yang menyediakan healthy food dengan bahan bahan yang berkualitas.
                          </p>
                        </div>
                      </div>
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                          <h4>Bagaimana Cara Pelayanan di Delicacy Food?</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                          <p class="mb-0">
                            Kami menyediakan pelayanan hanya take away dan juga delivery saja.
                          </p>
                        </div>
                      </div>
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                          <h4>Kategori makanan apa saja yang ada di Delicacy Food?</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                          <p class="mb-0">
                          Kami menyediakan kategori sebagai berikut:<br/>
                          1. Drinks<br/>
                          2. Grain<br/>
                          3. Soup<br/>
                          4. Pasta<br/>
                          5. Vegetables<br/>
                          6. Dessert<br/>
                          </p>
                        </div>
                      </div>
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
                          <h4>Menu apa saja yang ada di Delicacy Food?</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                          <p class="mb-0">
                          Kami menyediakan menu sebagai berikut:<br/>
                          1. Avocado Salad<br/>
                          2. Fettucini<br/>
                          3. Linguine<br/>
                          4. Fusili<br/>
                          5. Drained Grain<br/>
                          6. Protein Grain<br/>
                          7. Oat<br/>
                          8. Cocktail<br/>
                          9. Mint Squash<br/>
                          10. Milked Iced Coffee<br/>
                          11. Bread Soup<br/>
                          12. Carrot Soup<br/> 
                          13. Curry Soup<br/> 
                          14. Barbeque Salad<br/> 
                          15. Home Salad<br/>
                          16. Salad Bowl<br/> 
                          17. Fish Salad<br/>
                          18. Spinach Salad<br/>
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
  </section>
</div>
@endsection