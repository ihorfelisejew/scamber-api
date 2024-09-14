<div class="modal__block" id="my-modal">
    <button class="close__modal" onclick="closeModal()">
        <svg width="25" height="25" viewBox="0 0 14.0078 14.0078" fill="none" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink">
            <path id="Vector" d="M1 1L13 13M13 1L1 13" stroke="#000000" stroke-opacity="1.000000"
                stroke-width="2.000000" stroke-linejoin="round" />
        </svg>
    </button>
    @yield('modal-content')
</div>
