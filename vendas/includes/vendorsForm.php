<main>
    <section>
        <a href="./">
            <button class="btn btn-outline-primary">Back</button>
        </a>
    </section>

    <div class="container py-4" style="width: 70%;">
        <div class="bg-light rounded-3">
            <div class="container-fluid">

                <h2 class="py-4"><?=TITLE?></h2>

                <form method="post">

                    <div class="mb-3">
                        <label for="inputName" class="form-label">Vendor name</label>
                        <input type="text" class="form-control" name="inputName" value="<?=$obVendor->Vendor_Name?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputEmail" class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="inputEmail" value="<?=$obVendor->Vendor_Email?>">
                    </div>

                    <div class="mb-3">
                        <label for="inputPhone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="inputPhone" value="<?=$obVendor->Vendor_Phone?>">
                    </div>

                    <div class="py-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>