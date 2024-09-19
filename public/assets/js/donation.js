function updatePreview() {
    const itemName = document.getElementById('name').value;
    const itemDescription = document.getElementById('description').value;
    const itemLocation = document.getElementById('location').value;
    const itemImage = document.getElementById('image').files[0];

    // Mendapatkan nilai terpilih dari elemen select
    const itemCategorySelect = document.getElementById('category_id');
    const itemCategory = itemCategorySelect.value;
    const itemCategoryText = itemCategorySelect.options[itemCategorySelect.selectedIndex].text;

    document.getElementById('preview-name').innerHTML = 'Nama Barang: ' + itemName;
    document.getElementById('preview-category').innerHTML = 'Kategori Barang: ' + itemCategoryText; // Menggunakan teks opsi terpilih
    document.getElementById('preview-description').innerHTML = 'Deskripsi: ' + itemDescription;
    document.getElementById('preview-location').innerHTML = 'Lokasi: ' + itemLocation;

    if (itemImage) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(itemImage);
    } else {
        document.getElementById('preview-image').src = '';
    }
}

// Menanggapi perubahan pada elemen-elemen input dan select
document.getElementById('name').addEventListener('input', updatePreview);
document.getElementById('description').addEventListener('input', updatePreview);
document.getElementById('location').addEventListener('input', updatePreview);
document.getElementById('category_id').addEventListener('change', updatePreview);
document.getElementById('image').addEventListener('change', updatePreview);
