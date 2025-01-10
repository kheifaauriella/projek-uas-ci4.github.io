<?= $this->extend('templates/index');?>

<?= $this->section('page-content'); ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
        }

        .todo-list {
            margin-top: 20px;
        }

        .todo-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            padding: 10px;
        }

        .todo-item input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 10px;
        }

        .todo-item span {
            flex-grow: 1;
            padding-left: 10px;
            min-width: 100px;
            cursor: text;
        }

        .todo-item span[contenteditable="true"]:empty:before {
            content: "Klik untuk menulis...";
            color: grey;
        }

        .todo-item.completed span {
            text-decoration: line-through;
            color: grey;
        }

        .btn-remove {
            background-color: transparent;
            border: none;
            color: red;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-remove:hover {
            text-decoration: underline;
        }

        .todo-item input[type="text"]:focus {
            outline: none;
        }
    </style>

<div class="container-fluid">
    <h2 class="text-center mb-4">To-Do List</h2>
    <div class="row">
        <div class="col-lg-8">
        <div class="todo-list" id="todoList">
            <!-- Daftar To-Do akan ditambahkan di sini -->
        </div>

        <!-- Input baru untuk menambahkan to-do -->
        <div class="todo-item">
            <input type="text" id="newTodoInput" class="form-control" placeholder="Ketik dan tekan Enter untuk menambahkan" />
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fungsi untuk memuat daftar to-do dari localStorage
        function loadTodos() {
        const todos = JSON.parse(localStorage.getItem('todos')) || [];
        const todoListContainer = document.getElementById('todoList');
        todoListContainer.innerHTML = ''; // Kosongkan daftar sebelum menambah yang baru
        todos.forEach(todo => {
            const todoItem = createTodoElement(todo.text, todo.completed);
            todoListContainer.appendChild(todoItem);
            });
        }

       // Fungsi untuk membuat elemen todo
        function createTodoElement(text, completed) {
            const todoItem = document.createElement('div');
            todoItem.classList.add('todo-item');

            // Checkbox
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = completed;
            checkbox.classList.add('form-check-input');
            checkbox.addEventListener('change', () => {
                updateTodoCompletion(todoItem, checkbox.checked);
            });

            // Teks todo (contenteditable)
            const span = document.createElement('span');
            span.contentEditable = true;
            span.textContent = text;

            span.addEventListener('input', () => {
                updateTodoText(todoItem, span.textContent);
            });

            // Menghapus todo jika backspace ditekan dan tidak ada teks
            span.addEventListener('keydown', (event) => {
                if (event.key === 'Backspace' && span.textContent.trim() === '') {
                    todoItem.remove();
                    saveTodos();
                }
            });

            // Tombol Hapus
            const removeButton = document.createElement('button');
            removeButton.classList.add('btn-remove');
            removeButton.textContent = 'del';
            removeButton.addEventListener('click', () => {
                todoItem.remove();
                saveTodos();
            });

            // Menambahkan elemen checkbox, teks, dan tombol hapus ke dalam todoItem
            todoItem.appendChild(checkbox);
            todoItem.appendChild(span);
            todoItem.appendChild(removeButton);

            if (completed) {
                todoItem.classList.add('completed');
            }

            return todoItem;
        }


        // Fungsi untuk memperbarui status checkbox
        function updateTodoCompletion(todoItem, completed) {
            if (completed) {
                todoItem.classList.add('completed');
            } else {
                todoItem.classList.remove('completed');
            }
            saveTodos();
        }

        // Fungsi untuk memperbarui teks todo
        function updateTodoText(todoItem, newText) {
            const todos = JSON.parse(localStorage.getItem('todos')) || [];
            const index = Array.from(todoItem.parentElement.children).indexOf(todoItem);
            todos[index].text = newText;
            localStorage.setItem('todos', JSON.stringify(todos));
        }

        // Fungsi untuk menyimpan todos ke localStorage
        function saveTodos() {
            const todos = [];
            const todoItems = document.querySelectorAll('.todo-item');
            todoItems.forEach(todoItem => {
                const checkbox = todoItem.querySelector('input[type="checkbox"]');
                const span = todoItem.querySelector('span');
                todos.push({
                    text: span.textContent.trim(),
                    completed: checkbox.checked
                });
            });
            localStorage.setItem('todos', JSON.stringify(todos));
        }

        // Fungsi untuk menambah item baru ketika menekan Enter
        // Fungsi untuk menambah item baru ketika menekan Enter
        function addNewItemOnEnter(event) {
            if (event.key === 'Enter' && event.target.value.trim() !== '') {
                const newItemText = event.target.value.trim();
                const newTodoItem = createTodoElement(newItemText, false);
                document.getElementById('todoList').appendChild(newTodoItem);
                saveTodos();
                event.target.value = ''; // Kosongkan area setelah item ditambahkan
            }
        }


        // Menambahkan event listener untuk menambahkan item baru
        // Menambahkan event listener untuk menambahkan item baru
        window.onload = () => {
            loadTodos();
            // Menambahkan event listener pada input untuk menambah todo saat tekan Enter
            document.getElementById('newTodoInput').addEventListener('keydown', addNewItemOnEnter);
        };

    </script>

<?= $this->endSection();?>