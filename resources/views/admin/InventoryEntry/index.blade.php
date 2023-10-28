@extends('admin.layouts.master')
@section('title')
    Nhập kho
@endsection
@section('content')
<div class="container">
    <input type="text" id="searchInput" placeholder="Tìm kiếm..." />
    <div id="suggestions"></div>
    <table id="selectedSuggestions">
      <thead>
        <tr>
          <th>Gợi ý đã chọn</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
</div>

@endsection

@push('scripts')
<script>
    const searchInput = document.getElementById("searchInput");
    const suggestions = document.getElementById("suggestions");
    const selectedSuggestionsTable = document
      .getElementById("selectedSuggestions")
      .getElementsByTagName("tbody")[0];

    // Một danh sách ví dụ cho gợi ý
    const suggestionList =  {!! json_encode($products) !!};
    console.log(suggestionList);
    // const suggestionList =  suggestion.title;

    const selectedSuggestions = [];

    // Xử lý sự kiện nhập vào trường tìm kiếm
    searchInput.addEventListener("input", function () {
      const searchText = searchInput.value.toLowerCase();
      suggestions.innerHTML = "";

      if (searchText.length === 0) {
        suggestions.style.display = "none";
        return;
      }

      const filteredSuggestions = suggestionList.filter((item) =>
        item.toLowerCase().includes(searchText)
      );
      if (filteredSuggestions.length > 0) {
        filteredSuggestions.forEach((suggestion) => {
          const suggestionItem = document.createElement("div");
          const suggestionCheckbox = document.createElement("input");
          suggestionCheckbox.type = "checkbox";
          suggestionItem.textContent = suggestion;
          suggestionItem.insertBefore(
            suggestionCheckbox,
            suggestionItem.firstChild
          );
          suggestions.appendChild(suggestionItem);

          suggestionCheckbox.addEventListener("change", function () {
            if (suggestionCheckbox.checked) {
              selectedSuggestions.push(suggestion);
              // Xóa ô checkbox và gợi ý đã chọn
              suggestionItem.remove();
              // Kiểm tra xem còn gợi ý nào không, nếu không thì tắt trường suggestions
              if (suggestions.children.length === 0) {
                suggestions.style.display = "none";
              }
            }
            // Reset giá trị của trường nhập (searchInput) thành chuỗi trống
            searchInput.value = "";
            suggestions.style.display = "none";

            updateSelectedSuggestionsTable();
          });
        });

        suggestions.style.display = "block";
      } else {
        suggestions.style.display = "none";
      }
    });

    // Cập nhật bảng hiển thị các gợi ý đã chọn
    function updateSelectedSuggestionsTable() {
      selectedSuggestionsTable.innerHTML = "";
      selectedSuggestions.forEach((suggestion) => {
        const row = selectedSuggestionsTable.insertRow();
        const cell = row.insertCell(0);
        cell.textContent = suggestion;
      });
    }
  </script>
@endpush