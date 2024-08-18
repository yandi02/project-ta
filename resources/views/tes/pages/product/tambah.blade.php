@extends('tes.layouts.master')

@section('content')
    <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Add Product</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="../main/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../assets/images/breadcrumb/ChatBc.png" alt="modernize-img" class="img-fluid mb-n4" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-7">
                        <h4 class="card-title">General</h4>

                        <button class="navbar-toggler border-0 shadow-none d-md-none" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                            <i class="ti ti-menu fs-5 d-flex"></i>
                        </button>
                    </div>
                    <form action="" class="form-horizontal">
                        <div class="mb-4">
                            <label class="form-label">Product Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" value="Product Name">
                            <p class="fs-2">A product name is required and recommended to be unique.</p>
                        </div>
                        <div>
                            <label class="form-label">Description</label>
                            <div id="editor">
                            </div>
                            <p class="fs-2 mb-0">Set a description to the product for better visibility.</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Media</h4>

                    <form action="#" class="dropzone dz-clickable mb-2">
                        <div class="dz-default dz-message">
                            <button class="dz-button" type="button">Drop files here
                                to upload</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-7">Variation</h4>

                <form action="">
                  <label class="form-label">Add Product Variations</label>
                  <div class="email-repeater mb-3">
                    <div data-repeater-list="repeater-group">
                      <div data-repeater-item class="row mb-3">
                        <div class="col-md-4">
                          <select class="select2 form-control">
                            <option>Color</option>
                            <option selected>Size</option>
                            <option>Material</option>
                            <option>Style</option>
                          </select>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                          <input type="text" class="form-control" placeholder="Variation" />
                        </div>
                        <div class="col-md-2 mt-3 mt-md-0">
                          <button data-repeater-delete="" class="btn bg-danger-subtle text-danger" type="button">
                            <i class="ti ti-x fs-5 d-flex"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <button type="button" data-repeater-create="" class="btn bg-primary-subtle text-primary ">
                      <span class="fs-4 me-1">+</span>
                      Add another variation
                    </button>
                  </div>
                </form>
              </div>
            </div> -->
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Pricing</h4>

                    <form>
                        <div class="mb-7">
                            <label class="form-label">Base Price <span class="text-danger">*</span>
                            </label>
                            <input type="number" class="form-control" value="Product Price">
                            <p class="fs-2">Set the product price.</p>
                        </div>
                        <div class="mb-7">
                            <label class="form-label">Discount Type</label>
                            <nav>
                                <div class="nav nav-tabs justify-content-between align-items-center gap-9" id="nav-tab"
                                    role="tablist">
                                    <label for="radio1"
                                        class="form-check-label form-check p-3  border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-home-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-home" aria-controls="nav-home">
                                        <input type="radio" class="form-check-input" name="new-products" id="radio1"
                                            checked>
                                        <span class="fs-4 text-dark">No Discount</span>
                                    </label>
                                    <label for="radio2"
                                        class="form-check-label p-3 form-check border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-profile" aria-controls="nav-profile">
                                        <input type="radio" class="form-check-input" name="new-products"
                                            id="radio2">
                                        <span class="fs-4 text-dark">Percentage %</span>
                                    </label>
                                    <label for="radio3"
                                        class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                                        id="customControlValidation2" id="nav-contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contact" aria-controls="nav-contact">
                                        <input type="radio" class="form-check-input" name="new-products"
                                            id="radio3">
                                        <span class="fs-4 text-dark">Fixed Price</span>
                                    </label>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade mt-7" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="0">
                                    <form class="mt-3">
                                        <div class="form-group">
                                            <label class="form-label">Set Discount Percentage <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="range" class="form-range" id="customRange1" min="0"
                                                max="100" step="10">
                                            <p class="fs-2">Set a percentage discount to be applied on this product.</p>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade mt-7" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab" tabindex="0">
                                    <div class="mb-7">
                                        <label class="form-label">Fixed Discounted Price <span
                                                class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" placeholder="Discounted Price">
                                        <p class="fs-2">Set the discounted product price. The product will be reduced at
                                            the
                                            determined fixed price.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label">
                                        Tax Class <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected="">Select an option</option>
                                        <option value="1">Tax Free</option>
                                        <option value="2">Taxable Goods</option>
                                        <option value="3">Downloadable Products</option>
                                    </select>
                                    <p class="fs-2">Set the product tax class.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <label class="form-label">VAT Amount (%) <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" value="">
                                    <p class="fs-2">Set the product VAT about.</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-actions mb-5">
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
                <button type="button" class="btn bg-danger-subtle text-danger ms-6">
                    Cancel
                </button>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Thumbnail</h4>
                        <form action="#" class="dropzone dz-clickable mb-2">
                            <div class="dz-default dz-message">
                                <button class="dz-button" type="button">Drop Thumbnail here
                                    to upload</button>
                            </div>
                        </form>
                        <p class="fs-2 text-center mb-0">
                            Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                        </p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-7">
                            <h4 class="card-title">Status</h4>
                            <div class="p-2 h-100 bg-success rounded-circle"></div>
                        </div>
                        <form action="" class="form-horizontal">
                            <div>
                                <select class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect">
                                    <option selected="">Published</option>
                                    <option value="1">Draft</option>
                                    <option value="2">Sheduled</option>
                                    <option value="3">Inactive</option>
                                </select>
                                <p class="fs-2 mb-0">
                                    Set the product status.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-7">Product Details</h4>
                        <div class="mb-3">
                            <label class="form-label">Categories</label>
                            <select class="select2 form-control" multiple="multiple">
                                <option value="">Computer</option>
                                <option value="">Watches</option>
                                <option value="">Headphones</option>
                                <option value="">Beauty</option>
                                <option value="">Fashion</option>
                                <option value="">Footwear</option>
                            </select>
                            <p class="fs-2 mb-0">
                                Add product to a category.
                            </p>
                        </div>
                        <button type="button" class="btn bg-primary-subtle text-primary ">
                            <span class="fs-4 me-1">+</span>
                            Create New Category
                        </button>
                        <div class="mt-7">
                            <label class="form-label">Tags</label>
                            <select class="select2 form-control" multiple="multiple">
                                <option value="">New</option>
                                <option value="">trending</option>
                                <option value="">Headphones</option>
                                <option value="">Beauty</option>
                                <option value="">Fashion</option>
                                <option value="">Footwear</option>
                            </select>
                            <p class="fs-2 mb-0">
                                Add product to a category.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-7">Product Template</h4>
                  <form action="" class="form-horizontal">
                    <div>
                      <label class="form-label text-nowrap">Select a product template</label>
                      <select class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect">
                        <option selected="">Default Template</option>
                        <option value="1">Fashion</option>
                        <option value="2">Office Stationary</option>
                        <option value="3">Electronics</option>
                      </select>
                      <p class="fs-2 mb-0">
                        Assign a template from your current theme to define how a single product is displayed.
                      </p>
                    </div>
                  </form>
                </div>
              </div> -->
            </div>
        </div>
    </div>
@endsection
