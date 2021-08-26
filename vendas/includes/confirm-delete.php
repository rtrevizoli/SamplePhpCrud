<main>
    <section>
        <a href="./">
            <button class="btn btn-outline-primary">Back</button>
        </a>
    </section>

    <div class="container py-4" style="width: 30%; text-align: center;">
        <div class="container-fluid bg-light rounded-3 py-4">
            <form method="post">

                <div class="form-group">
                    <p>You are really sure to delete <strong><?= $obVendor->Vendor_Name ?></strong> ?</p>
                </div>

                <div class="form-group row">

                    <div class="col">
                        <a href="./">
                            <button type="button" class="btn btn-success">Cancel</button>
                        </a>
                    </div>

                    <div class="col">
                        <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                    </div>

                </div>

            </form>
        </div>
    </div>

</main>