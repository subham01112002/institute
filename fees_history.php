<?php 
include("conn.php");

if(empty($_REQUEST['month'])){
    $curr_month=date("m");
    $curr_year=date("Y");
}
else{
    $curr_month=$_REQUEST['month'];
    $curr_year=$_REQUEST['year'];
}
$sql=mysqli_query($conn,"SELECT `student_activity`.`Student_id` AS 'id',`Student_name`,`Student_reg_no`,SUM(`Actual_fees`) AS 'Fees' FROM `student_registration` INNER JOIN  `student_activity` ON `student_registration`.`Student_id`=`student_activity`.`Student_id` WHERE `student_registration`.`Joining_date` <= '$curr_year-$curr_month-31' AND `student_activity`.`Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y'   GROUP BY `student_activity`.`Student_id`");

if(isset($_REQUEST['mode'])){
    $name=$_REQUEST['search'];
    $sql=mysqli_query($conn,"SELECT `student_activity`.`Student_id` AS 'id',`Student_name`,`Student_reg_no`,SUM(`Actual_fees`) AS 'Fees' FROM `student_registration` INNER JOIN  `student_activity` ON `student_registration`.`Student_id`=`student_activity`.`Student_id` WHERE `student_registration`.`Joining_date` <= '$curr_year-$curr_month-31' AND `student_activity`.`Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y' AND `student_registration`.`Student_name` LIKE '%$name%'    GROUP BY `student_activity`.`Student_id`");

}
if(isset($_REQUEST['search'])){
    $name=$_REQUEST['search'];
    $sql=mysqli_query($conn,"SELECT `student_activity`.`Student_id` AS 'id',`Student_name`,`Student_reg_no`,SUM(`Actual_fees`) AS 'Fees' FROM `student_registration` INNER JOIN  `student_activity` ON `student_registration`.`Student_id`=`student_activity`.`Student_id` WHERE `student_registration`.`Joining_date` <= '$curr_year-$curr_month-31' AND `student_activity`.`Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y' AND `student_registration`.`Student_name` LIKE '%$name%'    GROUP BY `student_activity`.`Student_id`");

}
if(isset($_REQUEST['show'])){
    $show=$_REQUEST['show'];
}
else{
    $show="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"  href="student_list.css">
</head>
<body>
<div class="form-box">
  <h1><a href="index.php"><i class="fa-sharp fa-solid fa-id-card"></i></a></h1>
  <h1>Fees History - <span id="content">All</span></h1>
  
  <div style="display:flex;justify-content:center;gap:10px">
    <span onclick="window.location.href='fees_history.php'" style="cursor:pointer;">All</span>
    <span onclick="window.location.href='fees_history.php?show=paid'" style="cursor:pointer;">Paid</span>
    <span onclick="window.location.href='fees_history.php?show=unpaid'" style="cursor:pointer;">Unpaid</span>
    <i class="fa fa-download" aria-hidden="true" style="font-size:larger;color:blueviolet;cursor:pointer" onclick="generate()"></i>
</div>
<div style="display:flex;justify-content:end;gap:10px;margin-bottom: 15px">
  <form>
    <input type="hidden" name="mode" value="1">
    <input type="search" name="search" value="<?php if(isset($name)) echo $name; ?>" placeholder="Search By Name">
    <input type="submit" >

  </form>
   </div>
<div style="display:flex;justify-content:end;gap:10px">
<select id="month"  onchange="month(this.value)">
<option value="01" <?php if($curr_month=="1") echo "selected"; ?>  <?php if(date("m")<"1") echo "disabled"; ?>>January</option>
<option value="02" <?php if($curr_month=="2") echo "selected"; ?>  <?php if(date("m")<"2") echo "disabled"; ?>>February</option>
<option value="03" <?php if($curr_month=="3") echo "selected"; ?>  <?php if(date("m")<"3") echo "disabled"; ?>>March</option>
<option value="04" <?php if($curr_month=="4") echo "selected"; ?>  <?php if(date("m")<"4") echo "disabled"; ?>>April</option>
<option value="05" <?php if($curr_month=="5") echo "selected"; ?>  <?php if(date("m")<"5") echo "disabled"; ?>>May</option>
<option value="06" <?php if($curr_month=="6") echo "selected"; ?>  <?php if(date("m")<"6") echo "disabled"; ?>>June</option>
<option value="07" <?php if($curr_month=="7") echo "selected"; ?>  <?php if(date("m")<"7") echo "disabled"; ?>>July</option>
<option value="08" <?php if($curr_month=="8") echo "selected"; ?>  <?php if(date("m")<"8") echo "disabled"; ?>>August</option>
<option value="09" <?php if($curr_month=="9") echo "selected"; ?> <?php if(date("m")<"9") echo "disabled"; ?>>September</option>
<option value="10" <?php if($curr_month=="10") echo "selected"; ?> <?php if(date("m")<"10") echo "disabled"; ?>>October</option>
<option value="11" <?php if($curr_month=="11") echo "selected"; ?>  <?php if(date("m")<"11") echo "disabled"; ?>>November</option>
<option value="12" <?php if($curr_month=="12") echo "selected"; ?> <?php if(date("m")<"12") echo "disabled"; ?>>December</option>

</select>
<select id="year" onchange="year(this.value)">
   
<?php for($i=date("Y");$i>=2010;$i--){ ?>
    
    <option value="<?php echo $i; ?>" <?php if($curr_year==$i) echo "selected" ?>><?php echo $i; ?></option>
    <?php } ?>
   
</select>
</div>
<div id="DataTable">
  <div id="table_box_bootstrap"></div>
  <table id="myTable">
    <thead>
        <tr>
          <th>Name</th>
          <th>Registration ID</th>
          <th>Subjects</th>
          <th>Fees</th>
          <th>Total Fees</th>
          <th>Paid Amount</th>
          <th>Paid Date</th>
          <th>Status</th>
          <th>Actions</th>
          
        </tr>
    </thead>
    <tbody class="scroll-pane">
        
        <?php $i=0;  while($arr=mysqli_fetch_array($sql)){?> 
            <?php
                $paid=0;
            $id=$arr['id'];
            
            $subject_1=mysqli_query($conn,"SELECT * FROM `student_activity` INNER JOIN `subject_master` ON `student_activity`.`Subject_id`=`subject_master`.`Subject_id` WHERE `Student_id`='$id' AND `Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y'");
            $query_1=mysqli_query($conn,"SELECT * FROM `fees_history` WHERE `student_id`='$id' AND `month` LIKE '$curr_year-$curr_month'");
            $lat_date=mysqli_fetch_array(mysqli_query($conn,"SELECT MAX(date) AS 'date' FROM `fees_history` WHERE `student_id`='$id' AND `month` LIKE '$curr_year-$curr_month'"));
            if($lat_date)
            {
                $lat_date=$lat_date['date'];
            }
            
            $arr_it=array();
            while($fees_1=mysqli_fetch_array($query_1))
            {
                array_push($arr_it,$fees_1['subject_id']);
            }
  
            while($sub25=mysqli_fetch_array($subject_1)){
                if(in_array($sub25['Subject_id'] ,$arr_it))
                $paid+=$sub25['Actual_fees'];
            }
            
        
            ?>
        <?php if($show=="" || ($show=="unpaid" && $paid<$arr['Fees']) || ($show=="paid" && $paid==$arr['Fees']) ){ ?>
        <tr>
            <?php
            $paid=0;
            $id=$arr['id'];
                      ?>
        <td  id="id-<?php echo $i ?>" data-id="<?php echo $arr['id']; ?>"><a href='fees_details.php?id=<?php echo $arr['id']; ?>' style="text-decoration:none;color:black"><?php echo $arr['Student_name'] ?></a></td>
        <td><?php echo $arr['Student_reg_no'] ?></td>
        <?php 
        $subject=mysqli_query($conn,"SELECT * FROM `student_activity` INNER JOIN `subject_master` ON `student_activity`.`Subject_id`=`subject_master`.`Subject_id` WHERE `Student_id`='$id' AND `Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y'");
        ?>
        
        <td>
            <?php while($sub=mysqli_fetch_array($subject)){  
                echo $sub['Subject_name']."<br/>";
                }?>
                
                
        </td>
        <td><?php
        $subject=mysqli_query($conn,"SELECT * FROM `student_activity` INNER JOIN `subject_master` ON `student_activity`.`Subject_id`=`subject_master`.`Subject_id` WHERE `Student_id`='$id' AND `Joining_date`<= '$curr_year-$curr_month-31' AND `student_activity`.`Status`='Y'");
         ?>
         <input type="checkbox" class="fees_all-<?php echo $i ?>" onclick="select_all(<?php echo $i ?>)" value="<?php echo $arr['Fees'] ?>"> Select All <br> 
        <?php
        while($sub2=mysqli_fetch_array($subject)){ ?>  
              <input type="checkbox" class="fees-<?php echo $i ?>"  data-sub='<?php echo $sub2['Subject_id'] ?>' value="<?php echo $sub2['Actual_fees'] ?>" onclick="fees(this,<?php echo $i ?>)" <?php if(in_array($sub2['Subject_id'] ,$arr_it)) { echo "checked disabled"; $paid+=$sub2['Actual_fees']; } ?> > <?php echo  $sub2['Actual_fees']; ?><br/>
             <?php   }?>
                </td>
        <td><?php echo $arr['Fees'] ?></td>
        <td id="paid-<?php  echo $i  ?>"><?php echo $paid; ?></td>
        <td><input type="date"  class="date-<?php echo $i ?>" <?php if($lat_date){ ?> value="<?php echo $lat_date ?>" <?php } ?> max="<?php echo date("Y-m-d") ?>"></td>
        <td><?php echo  $paid==0 ?  "Unpaid" : ($paid<$arr['Fees'] ?  "Partially Paid" :  "Paid"); ?></td>
        <td><input type="button" value="Submit" onclick="submit(<?php echo $i ?>)"></td>
        </tr>
        <?php $i++; }  } ?>
        
  </tbody>
</table>
</div>
        </div>
        <script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
    function generate(){
        var doc = new jsPDF("p", "mm", "a4");
        html2canvas(document.querySelector('#myTable')).then(function(canvas){
        var imgData = canvas.toDataURL('image/png');
        var pageHeight = 295;  
        var imgWidth = (canvas.width * 60) / 210 ; 
        var imgHeight = canvas.height * imgWidth / canvas.width;
        var heightLeft = imgHeight;
        var position = 15;
        doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight; 
            }
            doc.save(Date.now()+'_fees_report-<?php echo $curr_month."-".$curr_year; ?>'+'.pdf');
        });
            }
    function filter(para) { 
        document.getElementById('content').innerHTML=para.charAt(0).toUpperCase() + para.slice(1);;
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        if(para!='all'){
            document.getElementsByClassName("records")[0].value=0;
        }
        else{
            document.getElementsByClassName("records")[0].value=10;
            
        }
        for(let i in tr)
        {
            td=tr[i].getElementsByTagName("td")[7];
            if(td){
            txtValue = td.textContent || td.innerText;
            if(para == "all")
            {
                tr[i].style.display="";
            }
            else if(para== "paid" && txtValue == "Paid")
            {
                tr[i].style.display="";     
            }
            else if(para== "unpaid" && (txtValue == "Partially Paid" || txtValue == "Unpaid"))
            {
                tr[i].style.display="";            
            }
            else {
                tr[i].style.display="none";                
            }
        }
            
        }

     }
    function submit(num)
    {
        var month=document.getElementById('year').value+"-"+document.getElementById('month').value;
        var paid=document.getElementById('paid-'+num).innerHTML;
        if(paid==="" || paid==="0" )
        {
            alert("Select Subjects");
            return;
        }
        var date=document.getElementsByClassName('date-'+num)[0].value;
        if(date===""){
        alert("Select Date");
        return;
        }
        var subj=document.getElementsByClassName('fees-'+num);
        let str="";
        for(let i of subj)
        {
            if(i.checked)
            str+=i.dataset.sub+",";
        }
        str=str.substring(0,str.length-1);
        var id=document.getElementById('id-'+num).dataset.id;
        window.location.href="fees_sub.php?sub="+str+"&date="+date+"&id="+id+"&paid="+paid+"&month="+month;

    }
    function month(val){

        window.location.href="fees_history.php?month="+val+"&year="+document.getElementById('year').value+"&search=<?php if(isset($name)) echo $name;  ?>";
    }
    function year(val){

    window.location.href="fees_history.php?month="+document.getElementById('month').value+"&year="+val+"&search=<?php if(isset($name)) echo $name;  ?>";
    }
    function select_all(num) { 
        var sum=0;
        if(document.getElementsByClassName('fees_all-'+num)[0].checked===true){
        for(let i of document.getElementsByClassName('fees-'+num))
        {
            if(!i.disabled & !i.checked){
            i.checked=true;
            sum+=Number(i.value);
        }
    }
        document.getElementsByClassName('fees_all-'+num)[0].value=sum;
        fees(document.getElementsByClassName('fees_all-'+num)[0],num);
    
        }
        else{
        for(let i of document.getElementsByClassName('fees-'+num))
        {
            if(!i.disabled & i.checked){
            i.checked=false;
            
            sum-=i.value;
        }
    }
        
        document.getElementById('paid-'+num).innerHTML=Number(document.getElementById('paid-'+num).innerHTML)+sum;
        }
    
    
        }  
     function fees(ele,cls)
     {
        if(ele.checked===true && ele.disabled===false)
        document.getElementById('paid-'+cls).innerHTML=document.getElementById('paid-'+cls).innerHTML !=="" ? Number(document.getElementById('paid-'+cls).innerHTML)+Number(ele.value) : ele.value;
        if(ele.checked===false && ele.disabled===false)
        document.getElementById('paid-'+cls).innerHTML=Number(document.getElementById('paid-'+cls).innerHTML)-Number(ele.value);
        
     }


    var box = paginator({
    table: document.getElementById("DataTable").getElementsByTagName("table")[0],
    box_mode: "list",
});
box.className = "box";
document.getElementById("table_box_bootstrap").appendChild(box);


/*****************************************************
 * Paginator Function                                *
 *****************************************************
 * config : {
 *     get_rows : function used to select rows to do pagination on
 *         If no function is provided, checks for a config.table element and looks for rows in there to page
 *
 *     box : Empty element that will have page buttons added to it
 *         If no config.box is provided, but a config.table is, then the page buttons will be added using the table
 *
 *     table : table element to be paginated
 *         not required if a get_rows function is provided
 *
 *     rows_per_page : number of rows to display per page
 *         default number is 10
 *
 *     page: page to display
 *         default page is 1
 *
 *     box_mode: "list", "buttons", or function. determines how the page number buttons are built.
 *         "list" builds the page index in list format and adds class "pagination" to the ul element. Meant for use with bootstrap
 *         "buttons" builds the page index out of buttons
 *         if this field is a function, it will be passed the config object as its ownly param and assumed to build the page index buttons
 *
 *     page_options: false or [{text: , value: }, ... ] used to set what the dropdown menu options are available, resets rows_per_page value
 *         false prevents the options from being displayed
 *         [{text: , value: }, ... ] allows you to customize what values can be chosen, a value of 0 will display all the table's rows.
 *         the default setup is
 *           [
 *               { value: 5,  text: '5'   },
 *               { value: 10, text: '10'  },
 *               { value: 20, text: '20'  },
 *               { value: 50, text: '50'  },
 *               { value: 100,text: '100' },
 *               { value: 0,  text: 'All' }
 *           ]
 *
 *      active_class: set the class for page buttons to have when active.
 *          defaults to "active"
 *
 *     tail_call: function to be called after paginator is done
 * }
 */
function paginator(config) {
    // throw errors if insufficient parameters were given
    if (typeof config != "object")
        throw "Paginator was expecting a config object!";
    if (typeof config.get_rows != "function" && !(config.table instanceof Element))
        throw "Paginator was expecting a table or get_row function!";

    // get/make an element for storing the page numbers in
    var box;
    if (!(config.box instanceof Element)) {
        config.box = document.createElement("div");
    }
    box = config.box;

    // get/make function for getting table's rows
    if (typeof config.get_rows != "function") {
        config.get_rows = function () {
            var table = config.table
            var tbody = table.getElementsByTagName("tbody")[0]||table;

            // get all the possible rows for paging
            // exclude any rows that are just headers or empty
            children = tbody.children;
            var trs = [];
            for (var i=0;i<children.length;i++) {
                if (children[i].nodeType = "tr") {
                    if (children[i].getElementsByTagName("td").length > 0) {
                        trs.push(children[i]);
                    }
                }
            }

            return trs;
        }
    }
    var get_rows = config.get_rows;
    var trs = get_rows();

    // get/set rows per page
    if (typeof config.rows_per_page == "undefined") {
        var selects = box.getElementsByTagName("select");
        if (typeof selects != "undefined" && (selects.length > 0 && typeof selects[0].selectedIndex != "undefined")) {
            config.rows_per_page = selects[0].options[selects[0].selectedIndex].value;
        } else {
            config.rows_per_page = 10;
        }
    }
    var rows_per_page = config.rows_per_page;

    // get/set current page
    if (typeof config.page == "undefined") {
        config.page = 1;
    }
    var page = config.page;

    // get page count
    var pages = (rows_per_page > 0)? Math.ceil(trs.length / rows_per_page):1;

    // check that page and page count are sensible values
    if (pages < 1) {
        pages = 1;
    }
    if (page > pages) {
        page = pages;
    }
    if (page < 1) {
        page = 1;
    }
    config.page = page;
 
    // hide rows not on current page and show the rows that are
    for (var i=0;i<trs.length;i++) {
        if (typeof trs[i]["data-display"] == "undefined") {
            trs[i]["data-display"] = trs[i].style.display||"";
        }
        if (rows_per_page > 0) {
            if (i < page*rows_per_page && i >= (page-1)*rows_per_page) {
                trs[i].style.display = trs[i]["data-display"];
            } else {
                trs[i].style.display = "none";
            }
        } else {
            trs[i].style.display = trs[i]["data-display"];
        }
    }

    // page button maker functions
    config.active_class = config.active_class||"active";
    if (typeof config.box_mode != "function" && config.box_mode != "list" && config.box_mode != "buttons") {
        config.box_mode = "button";
    }
    if (typeof config.box_mode == "function") {
        config.box_mode(config);
    } else {
        var make_button;
        if (config.box_mode == "list") {
            make_button = function (symbol, index, config, disabled, active) {
                var li = document.createElement("li");
                var a  = document.createElement("a");
                a.href = "#";
                a.innerHTML = symbol;
                a.addEventListener("click", function (event) {
                    event.preventDefault();
                    this.parentNode.click();
                    return false;
                }, false);
                li.appendChild(a);

                var classes = [];
                if (disabled) {
                    classes.push("disabled");
                }
                if (active) {
                    classes.push(config.active_class);
                }
                li.className = classes.join(" ");
                li.addEventListener("click", function () {
                    if (this.className.split(" ").indexOf("disabled") == -1) {
                        config.page = index;
                        paginator(config);
                    }
                }, false);
                return li;
            }
        } else {
            make_button = function (symbol, index, config, disabled, active) {
                var button = document.createElement("button");
                button.innerHTML = symbol;
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    if (this.disabled != true) {
                        config.page = index;
                        paginator(config);
                    }
                    return false;
                }, false);
                if (disabled) {
                    button.disabled = true;
                }
                if (active) {
                    button.className = config.active_class;
                }
                return button;
            }
        }

        // make page button collection
        var page_box = document.createElement(config.box_mode == "list"?"ul":"div");
        if (config.box_mode == "list") {
            page_box.className = "pagination";
        }

        var left = make_button("&laquo;", (page>1?page-1:1), config, (page == 1), false);
        page_box.appendChild(left);

        for (var i=1;i<=pages;i++) {
            var li = make_button(i, i, config, false, (page == i));
            page_box.appendChild(li);
        }

        var right = make_button("&raquo;", (pages>page?page+1:page), config, (page == pages), false);
        page_box.appendChild(right);
        if (box.childNodes.length) {
            while (box.childNodes.length > 1) {
                box.removeChild(box.childNodes[0]);
            }
            box.replaceChild(page_box, box.childNodes[0]);
        } else {
            box.appendChild(page_box);
        }
    }
  
  var dvRecords = document.createElement("div");
  dvRecords.className = "dvrecords";
  box.appendChild(dvRecords);

    // make rows per page selector
    if (!(typeof config.page_options == "boolean" && !config.page_options)) {
        if (typeof config.page_options == "undefined") {
            config.page_options = [
                { value: 5,  text: '5'   },
                { value: 10, text: '10'  },
                { value: 20, text: '20'  },
                { value: 50, text: '50'  },
                { value: 100,text: '100' },
                { value: 0,  text: 'All' }
            ];
        }
        var options = config.page_options;
        var select = document.createElement("select");
        select.className = "records";
        for (var i=0;i<options.length;i++) {
            var o = document.createElement("option");
            o.value = options[i].value;
            o.text = options[i].text;
            select.appendChild(o);
        }
        select.value = rows_per_page;
        select.addEventListener("change", function () {
            config.rows_per_page = this.value;
            paginator(config);
        }, false);
        dvRecords.appendChild(select);
    }

    // status message
    var stat = document.createElement("span");
    stat.className = "stats";
    stat.innerHTML = "On page " + page + " of " + pages
        + ", showing rows " + (((page-1)*rows_per_page)+1)
        + " to " + (trs.length<page*rows_per_page||rows_per_page==0?trs.length:page*rows_per_page)
        + " of " + trs.length;
    
    dvRecords.appendChild(stat);

    // run tail function
    if (typeof config.tail_call == "function") {
        config.tail_call(config);
    }
    return box;
}


/**
 * jQuery.fn.sortElements
 * --------------
 * @author James Padolsey (http://james.padolsey.com)
 * @version 0.11
 * @updated 18-MAR-2010
 * --------------
 * @param Function comparator:
 *   Exactly the same behaviour as [1,2,3].sort(comparator)
 *   
 * @param Function getSortable
 *   A function that should return the element that is
 *   to be sorted. The comparator will run on the
 *   current collection, but you may want the actual
 *   resulting sort to occur on a parent or another
 *   associated element.
 *   
 *   E.g. $('td').sortElements(comparator, function(){
 *      return this.parentNode; 
 *   })
 *   
 *   The <td>'s parent (<tr>) will be sorted instead
 *   of the <td> itself.
 */
jQuery.fn.sortElements = (function(){
    
    var sort = [].sort;
    
    return function(comparator, getSortable) {
        
        getSortable = getSortable || function(){return this;};
        
        var placements = this.map(function(){
            
            var sortElement = getSortable.call(this),
                parentNode = sortElement.parentNode,
                
                // Since the element itself will change position, we have
                // to have some way of storing it's original position in
                // the DOM. The easiest way is to have a 'flag' node:
                nextSibling = parentNode.insertBefore(
                    document.createTextNode(''),
                    sortElement.nextSibling
                );
            
            return function() {
                
                if (parentNode === this) {
                    throw new Error(
                        "You can't sort elements if any one is a descendant of another."
                    );
                }
                
                // Insert before flag:
                parentNode.insertBefore(this, nextSibling);
                // Remove flag:
                parentNode.removeChild(nextSibling);
                
            };
            
        });
       
        return sort.call(this, comparator).each(function(i){
            placements[i].call(getSortable.call(this));
        });
        
    };
    
})();

    var table = $('table');
    
    $('th')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;
                    
            });
                
        });



</script>
</body>
</html>