<?php include 'header.php'; ?>
<title>አዴተራ│ የንግድ ድርጅቶች</title>
<link rel="stylesheet" href="static/css/organizations.css">
<div class="container-fluid full-body">
     <div class="col-md-6 ">
            <a class="custom-link" href="shops_list.php?ent_type=ሱቅ">
                <div class="cat">
                    <h1 class="cat-h">ሱቆች</h1>
                </div>
            </a>
            <a class="custom-link" href="{% url 'cart:cart_summary' %}">
                <div class="cat">
                    <h1 class="cat-h">ማከፋፈያዎች</h1>
                </div>
            </a>
            <a class="custom-link" href="{% url 'cart:cart_summary' %}">
                <div class="cat">
                    <h1 class="cat-h">ፋብሪካዎች</h1>
                </div>
            </a>
        </div>
        <div class="col-md-6 ">
            
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>