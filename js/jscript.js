var facility = [];

function exports(){
	window.open('./../bin/sa_datadict.xls.xls', '_blank');
}

function getDateDiff(a, b, c, d) {

	if(a==''){
		a='00:00:00';
	}

	if(b==''){
		b = '00:00:00';
	}
	var str1= c.split('-');
	var str2= d.split('-');
	var t1 = new Date(str1[2], str1[0]-1, str1[1]);
	//var t1 = new Date(str1[2], str1[0]-1, str1[1] + ' ' + a);
	var t2 = new Date(str2[2], str2[0]-1, str2[1] + ' ' + b);

	// alert(t1);

	var diffMS = t1 - t2;
	console.log(diffMS + ' ms');

	var diffS = diffMS / 1000;
	console.log(diffS + ' ');

	var diffM = diffS / 60;
	console.log(diffM + ' minutes');

	var diffH = diffM / 60;
	console.log(diffH + ' hours');

	var diffD = diffH / 24;
	console.log(diffD + ' days');
	// alert(diffD);
}

var vf = ('asd');
$(function(){
	$('#signout').click(function(){
		if(confirm('Comfirm to signout?')){
			window.location = '../signout.php';
		}
	});

	$('#view_btn').click(function(){
		window.location = 'index.php?id=1&sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&hos=' + $('#insts').val();
	});

	$('#view_btn2').click(function(){
		window.location = 'index.php?id=4&sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&case=' + $('#insts').val();
	});

	$('#view_btn3').click(function(){
		window.location = 'index.php?id=2&sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&hos=' + $('#insts').val();
	});

	$('#view_btn4').click(function(){
		var a = '';
		var hos = '';
		for(var a = 0; a<100 ; a++){
			if($('#checkbox_'+a).is(':checked')){
				hos += $('#checkbox_'+a).val() + '|';
			}
		}

		var dis = 0;
		if($('#showVal').is(':checked')){
			dis = 1;
		}

		if($('#insts').val()!=''){
			window.location = 'index.php?id=3&sub=1&sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&hospital=' + hos
			+ '&case=' + $('#insts').val() + '&query=' + $('#query').val() + '&view=' + $('#view').val() + '&gtd=' + $('#gtd').width() + '&dis=' + dis;
		}else{
			alert('Please select graph category');
		}

	});

	$('#view_btn5').click(function(){
		var a = '';
		var hos = '';
		for(var a = 0; a<100 ; a++){
			if($('#checkbox_'+a).is(':checked')){
				hos += $('#checkbox_'+a).val() + '|';
			}
		}

		var dis = 0;
		if($('#showVal').is(':checked')){
			dis = 1;
		}

		if($('#insts').val()!=''){
			window.location = 'index.php?id=3&sub=2&sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&hospital=' + hos
			+ '&case=' + $('#insts').val() + '&query=1&view=1&gtd=' + $('#gtd').width() + '&dis=' + dis;
		}else{
			alert('Please select graph category');
		}

	});

	$('#view_btn6').click(function(){
		var a = '';
		var hos = '';
		for(var a = 0; a<100 ; a++){
			if($('#checkbox_'+a).is(':checked')){
				hos += $('#checkbox_'+a).val() + '|';
			}
		}

		window.location = './php/export_xls.php?sdate=' + $('#sdate').val() + '&edate=' + $('#edate').val() + '&hospital=' + $('#insts').val();
	});

	$('#view_btn7').click(function(){
		exports();
	});

	$('#ind_other2').keyup(function(){

	});

	$('#mode_del').change(function(){
		if(($('#mode_del').val()>=2) && ($('#mode_del').val()<=3)){
			$('#indication')
			.find('option')
				.remove()
				.end()

			.append($("<option></option>")
			  .attr("value",'')
			  .text("-- Please select indicator or add other --"))

			  .append($("<option></option>")
			  .attr("value",16)
			  .text("Foetal compromise"))

			  .append($("<option></option>")
			  .attr("value",17)
			  .text("Poor maternal effect"))

			  .append($("<option></option>")
			  .attr("value",18)
			  .text("Maternal medical consitions"))

			  .append($("<option></option>")
			  .attr("value",19)
			  .text("After-coming head in breech presentation"))

			  .append($("<option></option>")
			  .attr("value",20)
			  .text("Fetal malpresention"))

			  .append($("<option></option>")
			  .attr("value",21)
			  .text("Failure ro pregress in the second stage"));

			  $('#indication2')
			.find('option')
				.remove()
				.end()

			  .append($("<option></option>")
			  .attr("value",16)
			  .text("Foetal compromise"))

			  .append($("<option></option>")
			  .attr("value",17)
			  .text("Poor maternal effect"))

			  .append($("<option></option>")
			  .attr("value",18)
			  .text("Maternal medical consitions"))

			  .append($("<option></option>")
			  .attr("value",19)
			  .text("After-coming head in breech presentation"))

			  .append($("<option></option>")
			  .attr("value",20)
			  .text("Fetal malpresention"))

			  .append($("<option></option>")
			  .attr("value",21)
			  .text("Failure ro pregress in the second stage"));
		}else if($('#mode_del').val()==4){
			$('#indication')
			  .find('option')
				.remove()
				.end()

			  .append($("<option></option>")
			  .attr("value",'')
			  .text("-- Please select indicator or add other --"))

			  .append($("<option></option>")
			  .attr("value",1)
			  .text("Obstructed labour"))

			  .append($("<option></option>")
			  .attr("value",2)
			  .text("Major APH and Grade 3 or 6 placenta previa"))

			  .append($("<option></option>")
			  .attr("value",3)
			  .text("Malpresentation (Transverse, oblique, brow)"))

			  .append($("<option></option>")
			  .attr("value",4)
			  .text("Uterine rupture"))

			  .append($("<option></option>")
			  .attr("value",5)
			  .text("Failure to progress in labour (prolonged labour failed induction)"))

			  .append($("<option></option>")
			  .attr("value",6)
			  .text("Previous C/S"))

			  .append($("<option></option>")
			  .attr("value",7)
			  .text("APH (abruption placenta)"))

			  .append($("<option></option>")
			  .attr("value",8)
			  .text("Maternal medical diseases"))

			  .append($("<option></option>")
			  .attr("value",9)
			  .text("Severe pre-eclampsia/eclamsia"))

			  .append($("<option></option>")
			  .attr("value",10)
			  .text("Psyhosocial inductions (maternal request, \"precious\", pregnancy)"))

			  .append($("<option></option>")
			  .attr("value",11)
			  .text("Foetal compromise (foetal distress, cord prolapse, severe IUGR)"))

			  .append($("<option></option>")
			  .attr("value",12)
			  .text("Breech"))

			  .append($("<option></option>")
			  .attr("value",13)
			  .text("Previous Fistula/3rd degree tear repair"))

			  .append($("<option></option>")
			  .attr("value",14)
			  .text("Twin"))

			  .append($("<option></option>")
			  .attr("value",15)
			  .text("Macrosomic baby"));

			  $('#indication2')
			  .find('option')
				.remove()
				.end()

			  .append($("<option></option>")
			  .attr("value",1)
			  .text("Obstructed labour"))

			  .append($("<option></option>")
			  .attr("value",2)
			  .text("Major APH and Grade 3 or 6 placenta previa"))

			  .append($("<option></option>")
			  .attr("value",3)
			  .text("Malpresentation (Transverse, oblique, brow)"))

			  .append($("<option></option>")
			  .attr("value",4)
			  .text("Uterine rupture"))

			  .append($("<option></option>")
			  .attr("value",5)
			  .text("Failure to progress in labour (prolonged labour failed induction)"))

			  .append($("<option></option>")
			  .attr("value",6)
			  .text("Previous C/S"))

			  .append($("<option></option>")
			  .attr("value",7)
			  .text("APH (abruption placenta)"))

			  .append($("<option></option>")
			  .attr("value",8)
			  .text("Maternal medical diseases"))

			  .append($("<option></option>")
			  .attr("value",9)
			  .text("Severe pre-eclampsia/eclamsia"))

			  .append($("<option></option>")
			  .attr("value",10)
			  .text("Psyhosocial inductions (maternal request, \"precious\", pregnancy)"))

			  .append($("<option></option>")
			  .attr("value",11)
			  .text("Foetal compromise (foetal distress, cord prolapse, severe IUGR)"))

			  .append($("<option></option>")
			  .attr("value",12)
			  .text("Breech"))

			  .append($("<option></option>")
			  .attr("value",13)
			  .text("Previous Fistula/3rd degree tear repair"))

			  .append($("<option></option>")
			  .attr("value",14)
			  .text("Twin"))

			  .append($("<option></option>")
			  .attr("value",15)
			  .text("Macrosomic baby"));
		}
	});

	$('#rpr').change(function(){
		if($('#rpr').val()==2){
			$('#rpr_treated').val('Not applicable');
		}
	});


	$('#gaadm1unknown').click(function(){
		$('#ga_adm').val('Unknown');
	});

	$('#noanc1unknown').click(function(){
		$('#no_anc').val('Unknown');
	});

	$('#ga1unknown').click(function(){
		$('#ga1st').val('Unknown');
	});

	$('#dupunknown').click(function(){
		$('#duration_active_phase').val('Unknown');
	});

	$('#calDur').click(function(){
		//alert($('#date_fully').val());
		if(($('#stage_of_labour').val()==0)){
			alert('Please select stage of labor !');
		}else{
			if(($('#date_3cm').val()!='') && ($('#date_fully').val()!='') && ($('#time_fully').val()!='') && ($('#time_3cm').val()!='')){
				$('#duration_active_phase').val(getDateDiff($('#time_3cm').val()
				,$('#time_fully').val()
				,$('#date_3cm').val()
				,$('#date_fully').val()));

			}else{
				alert('Please insert date and time!');
			}
		}





	});
	//Obstetric control
	//HIV Status
	$('#hiv_1st,#hiv_retest,#hiv_labour').change(function(){
		//alert($('#hiv_1st').val() + $('#hiv_retest').val() + $('#hiv_labour').val())
		if(($('#hiv_1st').val()==0) && ($('#hiv_retest').val()==0)  && ($('#hiv_labour').val()==0)){
			$('#hiv_status').val('Unknown');
		}

		if(($('#hiv_1st').val()==2) || ($('#hiv_retest').val()==2) || ($('#hiv_labour').val()==2)){
			$('#cd4_count').val('Not applicable');
		}

		if(($('#hiv_1st').val()==3) || ($('#hiv_retest').val()==3) || ($('#hiv_labour').val()==3)){
			$('#hiv_status').val('Pos');
		}

		if(($('#hiv_1st').val()==2) && ($('#hiv_retest').val()==0) || ($('#hiv_retest').val()==1)){
			$('#hiv_status').val('Uncertained');
		}

		if(($('#hiv_1st').val()==2) && ($('#hiv_retest').val()==2)){
			$('#hiv_status').val('Neg');
		}

		if(($('#hiv_labour').val()==3)){
			$('#hiv_status').val('Pos');
		}
	});

	$('#hiv_status').change(function(){
		if($('#hiv_status').val('Neg')){
			$('#cd4_count').val('Not applicable');
		}else{
			$('#cd4_count').val('');
		}
	});

	$('#on_art_delivery').change(function(){
		if($('#on_art_delivery').val()!=0){
			$('#initiate_art').val('0');
		}
	});

	//Postnatal
	//Display function for date of disharge
	$('#rdg10').click(function(){
		$('#dod').show();
	});

	$('#rdg9').click(function(){
		$('#dod').hide();
		$('#date_od_dis').val('');
	});

	//Display function for refer status
	$('#rbm2').click(function(){
		$('.refer_s').show();
	});

	$('#rbm').click(function(){
		$('.refer_s').hide();
		$('#refer_date').val('');
		$('#refer_to').val('');
	});

	//Display function for mathernal death
	$('#rdg12').click(function(){
		$('#death').show();
	});

	$('#rdg11').click(function(){
		$('#death').hide();
		$('#date_death').val('');
	});

	//End postpartum ------------------

	//Display function for Newborn admission
	$('#rbm20').click(function(){
		$('#nbAdm').show();
	});

	$('#rbm19').click(function(){
		$('#nbAdm').hide();
		$('#nb_date_adm').val('');
		$('#nb_time_adm').val('');
	});

	//Display function for Newborn refer
	$('#rbm24').click(function(){
		$('#nbro').show();
	});

	$('#rbm23').click(function(){
		$('#nbro').hide();
		$('#nb_refer_facility').val('');
	});

	//Display function for Newborn Birth defects found
	$('#rbm26').click(function(){
		$('.bfd').show();
	});

	$('#rbm25').click(function(){
		$('.bfd').hide();
		$('#bdf_identify').val('');
		$('#rbm3').trigger('click');
	});

	//Displat function for Antepartum haemorrhage Complication
	$('#cp4').click(function(){
		$('#anter').show();
	});

	$('#cp3').click(function(){
		$('#anter').hide();
		$('#checkbox2').attr('checked', false);
		$('#checkbox').attr('checked', false);
	});

	//Display function for Newborn Alive or not?
	$('#alive').change(function(){
		if($('#alive').val()==0){
			$('#still').show();
			$('#rbm5').trigger('click');
		}else{
			$('#still').hide();
			$('#stillbirth').val(0);
		}

	});

	//Auto Calculate function for GA < 20 weeks or not?
	$('#ga1st').blur(function(){
		if($('#ga1st').val()<20){
			$('#ga20w').val(1);
		}else{
			$('#ga20w').val(0);
		}
	});

	//Display function for control Rh result
	$('#rh').change(function(){
		if($('#rh').val()=='Neg'){
			$('#rhq').show();
		}else{
			$('#rhq').hide();
		}
	});

	//Display function for control mother CD4
	$('#cd4').change(function(){
		if($('#cd4').val()==1){
			$('#cd4q').show();
			$('#cd4_count').val('');
		}else{
			$('#cd4q').hide();
			$('#cd4_count').val(0);
		}
	});

	//Display function for control mother stage of labour/
	$('#stage_of_labour').change(function(){
		if($('#stage_of_labour').val()!=0){
			$('.solq').show();
		}else{
			$('.solq').hide();
		}
	});

	//Display function for control mode of delivery
	$('#mode_del').change(function(){
		if(($('#mode_del').val()>=2) && ($('#mode_del').val()<=4)){
			$('#modq').show();
			$('#modq2').show();
		}else{
			$('#modq').hide();
			$('#modq2').hide();
			$('#indication').val('');
		}
	});

	//Auto calculate age at admission
	$('#dob').change(function(){
		var $birthday = $('#dob').val();
    	$('#c_age').val(calculateAge($birthday));

	});

	//Display function for control admission refer
	$('#refer_status').change(function(){
		if($('#refer_status').val()==1){
			$('.refer').show();
		}else{
			$('.refer').hide();
			$('#refer_facility').val('');
			$('#stage_of_patient').val(1);
		}
	});
});

var callFacility = function(){

	$.post("../lib/callFacility.php",{condition:1},function(data){
			for(var i=0;i<data.length;i++){
				facility.push(data[i].institute_name);
			}
	},'json');
}
//Calculate age function
var calculateAge = function(birthday) {
    // var now = new Date();
    // var past = new Date(birthday);
    // var nowYear = now.getFullYear();
    // var pastYear = past.getFullYear();
    // var age = nowYear - pastYear;
		//
    // return age;
		var today = new Date();
    var birthDate = new Date(birthday);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
};

function setHIVAlive(hiv){
	if(hiv=='Pos'){
		//alert('a');
		$('#rbm6').trigger('click');
	}
}
