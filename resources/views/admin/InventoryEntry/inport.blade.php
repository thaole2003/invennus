@extends('admin.layouts.master')
@section('title')
    Nhập kho
@endsection
@section('content')
    <div class="" style="margin-top:50px">
        <h1 class="text-center">Nhập kho</h1>
    </div>
    <div class="" style="width:100%;display:grid; position: relative;" >
        <div class="" style="width:30%;top:-50px; position: absolute;z-index:100;background-color:aliceblue">
            <input style="width:100%; margin-left:10px" type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm..." /><br>
            <div id="suggestions" style="text-align: center; display: flex; justify-content: center; align-items: center;"></div>
        </div>
        <div class="" style="width:100%;">
            <div id="selectedSuggestions">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Kích cỡ</th>
                            <th>Màu</th>
                            <th>Số lượng</th>
                            <th>Giá nhập</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="input-group" style="margin-bottom:20px;margin-left:20px">
                <span class="btn">Chọn nhà cung cấp</span>
                <select name="vender" class="form-select" id="inputGroupSelect04">
                    @foreach ($vender as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" id="button" style="margin-left:20px" class="btn btn-primary">Tạo đơn</button>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        const searchInput = document.getElementById("searchInput");
        const suggestions = document.getElementById("suggestions");
        const selectedSuggestionsTable = document.querySelector("#selectedSuggestions table tbody");

        // Một danh sách ví dụ cho gợi ý
        const suggestionList = {!! json_encode($productVariants) !!};
        const selectedSuggestions = [];

        const updateSuggestionsDisplay = () => {
            suggestions.innerHTML = "";

            suggestionList.forEach((suggestion) => {
                const suggestionItem = document.createElement("div");
                suggestionItem.classList.add("suggestion-item","d-flex","p-2", "m-2");

                const suggestionCheckbox = document.createElement("input");
                suggestionCheckbox.type = "checkbox";
                suggestionCheckbox.classList.add("mr-2")
                suggestionItem.appendChild(suggestionCheckbox);

                const suggestionInfo = document.createElement("div");
                suggestionInfo.classList.add("suggestion-info");

                const suggestionTitle = document.createElement("span");
                suggestionTitle.classList.add("suggestion-title");
                suggestionTitle.textContent =`Sản phẩm: `+ suggestion.sku;

                const suggestionSize = document.createElement("span");
                suggestionSize.classList.add("suggestion-size");
                suggestionSize.textContent = ` Kích cỡ: ${suggestion.size_name}`;

                const suggestionColor = document.createElement("span");
                suggestionColor.classList.add("suggestion-color");
                suggestionColor.textContent = ` Màu: ${suggestion.color_name}`;

                suggestionInfo.appendChild(suggestionTitle);
                suggestionInfo.appendChild(suggestionSize);
                suggestionInfo.appendChild(suggestionColor);

                suggestionItem.appendChild(suggestionInfo);
                suggestions.appendChild(suggestionItem);

                suggestionCheckbox.addEventListener("change", function() {
                    if (suggestionCheckbox.checked) {
                        selectedSuggestions.push(suggestion);
                        suggestionItem.remove();
                        if (suggestions.children.length === 0) {
                            suggestions.style.display = "none";
                        }
                    }
                    searchInput.value = "";
                    suggestions.style.display = "none";
                    updateSelectedSuggestionsTable();
                });
            });

            suggestions.style.display = "block";
        };

        // Xử lý sự kiện nhập vào trường tìm kiếm
        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.toLowerCase();
            suggestions.innerHTML = "";

            const filteredSuggestions = suggestionList.filter((item) =>
                item.sku.toLowerCase().includes(searchText)
            );

            if (searchText.length === 0 || filteredSuggestions.length === 0) {
                suggestions.style.display = "none";
            } else {
                updateSuggestionsDisplay();
            }
        });


        let totalQuantity = 0;
        let totalPrice = 0;

        function updateSelectedSuggestionsTable() {
            selectedSuggestionsTable.innerHTML = "";

            selectedSuggestions.forEach((suggestion) => {
                const row = selectedSuggestionsTable.insertRow();
                row.classList.add('rowProduct' + suggestion.id);

                // Tạo các ô cột tương ứng
                const titleCell = row.insertCell(0);
                const sizeCell = row.insertCell(1);
                const colorCell = row.insertCell(2);
                const quantityCell = row.insertCell(3);
                const priceCell = row.insertCell(4);
                const deleteCell = row.insertCell(5); // Thêm một ô cột mới cho nút xoá

                // Gán giá trị cho từng ô cột
                titleCell.textContent = suggestion.sku;
                sizeCell.textContent = suggestion.size_name;
                colorCell.textContent = suggestion.color_name;

                // Tạo input để nhập số lượng
                const quantityInput = document.createElement("input");
                quantityInput.type = "number";
                quantityInput.value = suggestion.quantity || 0;
                quantityCell.appendChild(quantityInput);

                // Tạo input để nhập giá tiền
                const priceInput = document.createElement("input");
                priceInput.type = "number";
                priceInput.value = suggestion.price || 0;
                priceCell.appendChild(priceInput);

                // Thêm nút xoá và gán sự kiện click
                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Xoá";
                deleteButton.classList.add("btn","btn-danger");
                deleteButton.addEventListener("click", function() {
                    // Xoá dòng và cập nhật mảng selectedSuggestions
                    row.remove();
                    const index = selectedSuggestions.findIndex((item) => item.id === suggestion.id);
                    selectedSuggestions.splice(index, 1);
                    // Cập nhật tổng khi xoá
                    updateTotal();
                });
                deleteCell.appendChild(deleteButton);

                // Gán class cho từng ô cột
                titleCell.classList.add("selected-title");
                sizeCell.classList.add("selected-size");
                colorCell.classList.add("selected-color");
                quantityCell.classList.add("selected-quantity");
                priceCell.classList.add("selected-price");
                deleteCell.classList.add("delete-button");

                // Thêm sự kiện lắng nghe để cập nhật giá trị khi người dùng thay đổi
                quantityInput.addEventListener("input", function() {
                    suggestion.quantity = quantityInput.value;
                    // Cập nhật tổng khi thay đổi số lượng
                    updateTotal();
                });

                priceInput.addEventListener("input", function() {
                    suggestion.price = priceInput.value;
                    // Cập nhật tổng khi thay đổi giá
                    updateTotal();
                });

                // Cộng dồn vào tổng
                totalQuantity += parseFloat(quantityInput.value);
                totalPrice += parseFloat(priceInput.value);
            });

            // Hàm cập nhật tổng
            function updateTotal() {
                totalQuantity = 0;
                totalPrice = 0;
                selectedSuggestions.forEach((suggestion) => {
                    totalQuantity += parseFloat(suggestion.quantity);
                    totalPrice += parseFloat(suggestion.price*suggestion.quantity);
                });
            }

            console.log("Total Quantity:", totalQuantity);
            console.log("Total Price:", totalPrice);
        }
        $(function() {
        $(document).on('click', '#button', function() {
            console.log("Total Quantity:", totalQuantity);
            console.log("Total Price:", totalPrice);

            // Validate quantity and price inputs
            if (!validateInputs()) {
                // If validation fails, do not proceed with the AJAX request
                return;
            }

            $.ajax({
                type: 'POST',
                url: "{{ route('addStock') }}",
                data: {
                    vender: $('#inputGroupSelect04').val(),
                    selectedSuggestions: selectedSuggestions,
                    _token: '{{ csrf_token() }}',
                    totalQuantity: totalQuantity,
                    totalPrice: totalPrice,
                },
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    window.location.href = 'InventoryEntry';
                },
                error: function(xhr, status, error) {
                    // Handle error scenarios
                }
            });
        });
    });

    function validateInputs() {
        if (selectedSuggestions.length === 0) {
        // Display a Toastr notification or alert if no products are selected
        alert('Bạn chưa chọn sản phẩm')
        return false;
        }
    // Loop through each selected suggestion and validate its quantity and price
    for (const suggestion of selectedSuggestions) {
        const quantityInput = parseFloat(suggestion.quantity);
        const priceInput = parseFloat(suggestion.price);

        // Check if quantity and price are greater than 0
        if (isNaN(quantityInput) || quantityInput <= 0 || isNaN(priceInput) || priceInput <= 0) {
            alert('Số lượng và đơn giá phải lớn hơn 0');
            return false;
        }
    }

    return true; // All inputs are valid
}

    </script>
@endpush
