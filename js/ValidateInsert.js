function validate(form1, textspan)
{
		  var returncode = true;
                  //regular expression for first name.
		  var nameRegExp = new RegExp(/^[A-Z]+[a-zA-Z]*$/);
                  //regular expression for Date YYYY-MM-DD
                  var dateRegExp = new RegExp(/^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/);
                  var code = document.getElementById('title').value;
                  var code2 = document.getElementById('description').value;
//                  var code3 = document.getElementById('bDate').value;
//                  var code4 = document.getElementById('gender').value;
//                  var code5 = document.getElementById('hDate').value;
//                  var span = document.getElementById('fname');
//                  var span2 = document.getElementById('lname');
//                  var span3 = document.getElementById('bdate');
//                  var span4 = document.getElementById('Gender');
//                  var span5 = document.getElementById('hdate');
		
	  if(!nameRegExp.test(code))
	  {
                  //span.innerHTML = 'You must enter a first name. Name must have a capital letter.';
                  returncode = false;
      }
//                    else
//	          span.innerHTML = '';
//	  if(!nameRegExp.test(code2))
//	  {
//		  span2.innerHTML = 'You must enter a last name. Name must have a capital letter.';
//		  returncode = false;
//          }
//                    else
//		  span2.innerHTML = '';
//      	  if(!dateRegExp.test(code3))
//	  {
//		  span3.innerHTML = 'You must enter a date in the form YYYY-MM-DD';
//		  returncode = false;
//          }
//                    else
//		  span3.innerHTML = '';
//
//
//          if(code4 != 'M' && code4 != 'F')
//	  {
//		  span4.innerHTML = 'You must enter either M or F';
//		  returncode = false;
//          }
//                    else
//		  span4.innerHTML = '';
//
//
//          if(!dateRegExp.test(code5))
//	  {
//		  span5.innerHTML = 'You must enter a date in the form YYYY-MM-DD';
//		  returncode = false;
//          }
//                    else
//		  span5.innerHTML = '';

	return returncode;
  }
