// //Getting all required elements
// const inputField = document.querySelector(".input-field textarea"),
//   filters = document.querySelectorAll(".filters span"),
//   taskBox = document.querySelector(".todoLists"),
//   pendingNum = document.querySelector(".pending-num"),
//   clearAll = document.querySelector(".clear-button");

// let editId,
// isEditTask = false,
// todos = JSON.parse(localStorage.getItem("todo-list"));

// filters.forEach(btn => {
//     btn.addEventListener("click", () => {
//         document.querySelector("span.active").classList.remove("active");
//         btn.classList.add("active");
//         showTodo(btn.id);
//     });
// });

// function showTodo(filter) {
//     let liTag = "";
//     if(todos) {
//         todos.forEach((todo, id) => {
//             let completed = todo.status == "completed" ? "checked" : "";
//             if(filter == todo.status || filter == "all") {
//                 liTag += `<li class="task">
//                             <label for="${id}">
//                                 <input onclick="updateStatus(this)" type="checkbox" id="${id}" ${completed}>
//                                 <p class="${completed}">${todo.name}</p>
//                             </label>
//                             <div class="settings">
//                                 <i onclick="showMenu(this)" class="uil uil-ellipsis-h menu"></i>
//                                 <ul class="task-menu">
//                                     <li onclick='editTask(${id}, "${todo.name}")'><i class="uil uil-pen"></i>Edit</li>
//                                     <li onclick='deleteTask(${id}, "${filter}")'><i class="uil uil-trash"></i>Delete</li>
//                                 </ul>
//                             </div>
//                         </li>`;
//             }
//         });
//     }
//     taskBox.innerHTML = liTag || `<span class="not-tasks"> Você não tem tarefas aqui </span>`;
//     let checkTask = taskBox.querySelectorAll(".task");
//     !checkTask.length ? clearAll.classList.remove("active") : clearAll.classList.add("active");
//     taskBox.offsetHeight >= 300 ? taskBox.classList.add("overflow") : taskBox.classList.remove("overflow");
// }
// showTodo("all");

// function showMenu(selectedTask) {
//     let menuDiv = selectedTask.parentElement.lastElementChild;
//     menuDiv.classList.add("show");
//     document.addEventListener("click", e => {
//         if(e.target.tagName != "I" || e.target != selectedTask) {
//             menuDiv.classList.remove("show");
//         }
//     });
// }

// function updateStatus(selectedTask) {
//     let taskName = selectedTask.parentElement.lastElementChild;
//     if(selectedTask.checked) {
//         taskName.classList.add("checked");
//         todos[selectedTask.id].status = "completed";
//     } else {
//         taskName.classList.remove("checked");
//         todos[selectedTask.id].status = "pending";
//     }
//     localStorage.setItem("todo-list", JSON.stringify(todos))
// }

// function editTask(taskId, textName) {
//     editId = taskId;
//     isEditTask = true;
//     inputField.value = textName;
//     inputField.focus();
//     inputField.classList.add("active");
// }

// function deleteTask(deleteId, filter) {
//     isEditTask = false;
//     todos.splice(deleteId, 1);
//     localStorage.setItem("todo-list", JSON.stringify(todos));
//     showTodo(filter);
// }

// clearAll.addEventListener("click", () => {
//     isEditTask = false;
//     todos.splice(0, todos.length);
//     localStorage.setItem("todo-list", JSON.stringify(todos));
//     showTodo()
// });

// inputField.addEventListener("keyup", e => {
//     let userTask = inputField.value.trim();
//     if(e.key == "Enter" && userTask) {
//         if(!isEditTask) {
//             todos = !todos ? [] : todos;
//             let taskInfo = {name: userTask, status: "pending"};
//             todos.push(taskInfo);
//         } else {
//             isEditTask = false;
//             todos[editId].name = userTask;
//         }
//         inputField.value = "";
//         localStorage.setItem("todo-list", JSON.stringify(todos));
//         showTodo(document.querySelector("span.active").id);
//     }
// });




const wrapper = document.querySelector(".wrapper"),
editableInput = wrapper.querySelector(".editable"),
readonlyInput = wrapper.querySelector(".readonly"),
placeholder = wrapper.querySelector(".placeholder"),
counter = wrapper.querySelector(".counter"),
button = wrapper.querySelector("button");

editableInput.onfocus = ()=>{
  placeholder.style.color = "#c5ccd3";
}
editableInput.onblur = ()=>{
  placeholder.style.color = "#98a5b1";
}

editableInput.onkeyup = (e)=>{
  let element = e.target;
  validated(element);
}
editableInput.onkeypress = (e)=>{
  let element = e.target;
  validated(element);
  placeholder.style.display = "none";
}

function validated(element){
  let text;
  let maxLength = 200;
  let currentlength = element.innerText.length;

  if(currentlength <= 0){
    placeholder.style.display = "block";
    counter.style.display = "none";
    button.classList.remove("active");
  }else{
    placeholder.style.display = "none";
    counter.style.display = "block";
    button.classList.add("active");
  }

  counter.innerText = maxLength - currentlength;

  if(currentlength > maxLength){
    let overText = element.innerText.substr(maxLength); //extracting over texts
    overText = `<span class="highlight">${overText}</span>`; //creating new span and passing over texts
    text = element.innerText.substr(0, maxLength) + overText; //passing overText value in textTag variable
    readonlyInput.style.zIndex = "1";
    counter.style.color = "#e0245e";
    button.classList.remove("active");
  }else{
    readonlyInput.style.zIndex = "-1";
    counter.style.color = "#333";
  }
  readonlyInput.innerHTML = text; //replacing innerHTML of readonly div with textTag value
}


