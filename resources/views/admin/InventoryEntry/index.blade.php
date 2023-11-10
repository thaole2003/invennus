@extends('admin.layouts.master')
@section('title')
    Nhập kho
@endsection
@section('content')
    <div class="container">
        <form action="">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." />
            <div id="suggestions"></div>
            <div id="selectedSuggestions">
                <table class="table">
                    <tbody></tbody>
                </table>
            </div>
            {{-- .control --}}
        </form>

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
                suggestionItem.classList.add("suggestion-item");

                const suggestionCheckbox = document.createElement("input");
                suggestionCheckbox.type = "checkbox";
                suggestionItem.appendChild(suggestionCheckbox);

                const suggestionInfo = document.createElement("div");
                suggestionInfo.classList.add("suggestion-info");

                const suggestionTitle = document.createElement("span");
                suggestionTitle.classList.add("suggestion-title");
                suggestionTitle.textContent = suggestion.title;

                const suggestionSize = document.createElement("span");
                suggestionSize.classList.add("suggestion-size");
                suggestionSize.textContent = `Size: ${suggestion.size_id}`;

                const suggestionColor = document.createElement("span");
                suggestionColor.classList.add("suggestion-color");
                suggestionColor.textContent = `Color: ${suggestion.color_id}`;

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
                item.title.toLowerCase().includes(searchText)
            );

            if (searchText.length === 0 || filteredSuggestions.length === 0) {
                suggestions.style.display = "none";
            } else {
                updateSuggestionsDisplay();
            }
        });

        function updateSelectedSuggestionsTable() {
            selectedSuggestionsTable.innerHTML = "";

            selectedSuggestions.forEach((suggestion) => {
                const row = selectedSuggestionsTable.insertRow();

                // Tạo các ô cột tương ứng
                const titleCell = row.insertCell(0);
                const sizeCell = row.insertCell(1);
                const colorCell = row.insertCell(2);
                const quantityCell = row.insertCell(3);
                const priceCell = row.insertCell(4);

                // Gán giá trị cho từng ô cột
                titleCell.textContent = suggestion.title;
                sizeCell.textContent = suggestion.size_id;
                colorCell.textContent = suggestion.color_id;

                // Tạo input để nhập số lượng
                const quantityInput = document.createElement("input");
                quantityInput.type = "number";
                quantityInput.value = 1; // Giá trị mặc định là 1
                quantityCell.appendChild(quantityInput);

                // Tạo input để nhập giá tiền
                const priceInput = document.createElement("input");
                priceInput.type = "number";
                priceInput.value = 0; // Giá trị mặc định là 0
                priceCell.appendChild(priceInput);

                // Gán class cho từng ô cột
                titleCell.classList.add("selected-title");
                sizeCell.classList.add("selected-size");
                colorCell.classList.add("selected-color");
                quantityCell.classList.add("selected-quantity");
                priceCell.classList.add("selected-price");
            });
        }
    </script>
@endpush
