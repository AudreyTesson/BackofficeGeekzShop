<h1>Homepage</h1>

  <?php //dump($categories); ?>
  <?php //dump($products); ?>

  <div class="container my-4">
        <p class="display-4">
            Welcome in backOffice <strong>GeekzShop</strong>...
        </p>

        <div class="row mt-5">
            <div class="col-12 col-md-6">
                <div class="card text-white mb-3">
                    <div class="card-header bg-primary">Categories List</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($categories as $category) : ?>
                                <tr>
                                    <th scope="row"><?= $category->getId() ?></th>
                                    <td><?= $category->getName() ?></td>
                                    <td class="text-end">
                                        <a href="<?= $router->generate('category-edit', ['id' => $category->getId()]) ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Yes, I want to delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <a href="categories.html" class="btn btn-success">See more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card text-white mb-3">
                    <div class="card-header bg-primary">Products List</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($products as $product) : ?>
                                <tr>
                                    <th scope="row"><?= $product->getId() ?></th>
                                    <td><?= $product->getName() ?></td>
                                    <td class="text-end">
                                        <a href="<?= $router->generate('product-edit', ['id' => $product->getId()]) ?>" class="btn btn-sm btn-warning">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-danger dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Yes, I want to delete</a>
                                                <a class="dropdown-item" href="#" data-toggle="dropdown">Oups !</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2">
                            <a href="products.html" class="btn btn-success">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>