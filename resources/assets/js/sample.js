window.onload = function() {
    let has_teacher_select = document.querySelector("#teacher_select");
    let has_selected_teachers = document.querySelector("#selected_teachers");
    let add_teacher_btn = document.querySelector("#add_teacher_btn");
    
    function removeTeacher(e) {
        e.target.parentElement.parentElement.remove();
    }
    
    function addTeacher() {
        //重複チェック
        let s = new Set();
        document.querySelectorAll(".teacher_id").forEach(function(e){
            s.add(e.value);
        });
        let selected = document.querySelector('#teacher_select');
        let index = selected.selectedIndex;
        if (s.has(selected.options[index].value)) {
            //return;
        }
        //追加処理
        let li = document.createElement("li");
        li.classList.add("list-group-item");
        li.setAttribute("style", "padding: 1em");
        let div = document.createElement("div");
        div.classList.add("row");
        let name_div = document.createElement("div");
        name_div.classList.add("col-sm-3");
        name_div.setAttribute("style", "line-height: 36px;");
        name_div.innerText = selected.options[index].text;
        let input = document.createElement("input");
        input.type = "hidden";
        input.value = selected.options[index].value;
        input.name = "teacher_id[]";
        input.classList.add("teacher_id");
        let del_btn = document.createElement("button");
        del_btn.type = "button";
        del_btn.classList.add("btn");
        del_btn.classList.add("btn-danger");
        del_btn.classList.add("col-sm-2");
        del_btn.classList.add("remove_teacher_btn");
        del_btn.onclick =function(e){
            removeTeacher(e); 
        }
        del_btn.innerHTML = "削除";
        div.appendChild(name_div);
        div.appendChild(input);
        div.appendChild(del_btn);
        li.appendChild(div);
        has_selected_teachers.appendChild(li);
        //削除処理の設定
        
    }
    
    if (has_teacher_select !== null && has_selected_teachers !== null && add_teacher_btn !== null) {
        let remove_btns = document.querySelectorAll(".remove_teacher_btn");
        remove_btns.forEach(function(btn){
            btn.onclick =function(e){
                removeTeacher(e); 
            }
        });
        add_teacher_btn.onclick = function(e){
            addTeacher();
        };
    }
    //削除処理の設定
}

//     <div class="row">
//       <div class='col-sm-3' style='line-height: 36px;'>井関健人</div>
//       <input type="hidden" value='1' name="teacher_id[]"
//       <button type='button' class="btn btn-danger col-sm-2">削除</button>
//     </div>
