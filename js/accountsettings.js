$(document).ready(function() {
	//toggle `popup` / `inline` mode
	$.fn.editable.defaults.mode = 'inline';

	$('.editableText').editable({
		type: 'text',
		pk: 1,
		url: 'update'
});
	
	$('#password').editable({
		pk: 2,
		url: 'updatePassword',
		value: {
			old: "",
			password: "",
			confirm: ""
		}
	});

	$('#birthDate').editable({
		pk: 3,
		url: 'update',
		format: 'YYYY-MM-DD',
		viewformat: 'MMMM D, YYYY',
		template: 'MMMM / D / YYYY',
		combodate: {
			minYear: 1980,
			maxYear: 2015,
			minuteStep: 1
		}

	});
	
	$('#course').editable({
		pk: 4,
		url: 'update',
		source: [
		{value: 'BS CS-IST', text: 'BS CS-IST'},
		{value: 'BS CS-NE', text: 'BS CS-NE'},
		{value: 'BS CS-ST', text: 'BS CS-ST'},
		{value: 'BS IT', text: 'BS IT'},
		{value: 'BS INSYS', text: 'BS INSYS'}
		]

	});
	

	
});

(function ($) {
	"use strict";

	var Password = function (options) {
		this.init('password', options, Password.defaults);
	};

	//inherit from Abstract input
	$.fn.editableutils.inherit(Password, $.fn.editabletypes.abstractinput);

	$.extend(Password.prototype, {
		/**
		Renders input from tpl

		@method render() 
		**/        
		render: function() {
			this.$input = this.$tpl.find('input');
		},

		/**
		Default method to show value in element. Can be overwritten by display option.
		
		@method value2html(value, element) 
		**/
		value2html: function(value, element) {
			if(!value) {
				$(element).empty();
				return; 
			}
			$(element).html('------'); 
		},
		
		/**
		Gets value from element's html
		
		@method html2value(html) 
		**/        
		html2value: function(html) {        
		  /*
			you may write parsing method to get value by element's html
			e.g. "Moscow, st. Lenina, bld. 15" => {city: "Moscow", street: "Lenina", building: "15"}
			but for complex structures it's not recommended.
			Better set value directly via javascript, e.g. 
			editable({
				value: {
					city: "Moscow", 
					street: "Lenina", 
					building: "15"
				}
			});
*/ 
return null;  
},

	   /**
		Converts value to string. 
		It is used in internal comparing (not for sending to server).
		
		@method value2str(value)  
		**/
		value2str: function(value) {
			var str = '';
			if(value) {
				for(var k in value) {
					str = str + k + ':' + value[k] + ';';  
				}
			}
			return str;
		}, 

	   /*
		Converts string to value. Used for reading value from 'data-value' attribute.
		
		@method str2value(str)  
		*/
		str2value: function(str) {
		   /*
		   this is mainly for parsing value defined in data-value attribute. 
		   If you will always set value by javascript, no need to overwrite it
		   */
		   return str;
		},                

	   /**
		Sets value of input.

		@method value2input(value) 
		@param {mixed} value
		**/         
		value2input: function(value) {
			if(!value) {
				return;
			}
			this.$input.filter('[name="old"]').val(value.old);
			this.$input.filter('[name="password"]').val(value.password);
			this.$input.filter('[name="confirm"]').val(value.confirm);
		},       

	   /**
		Returns value of input.
		
		@method input2value() 
		**/          
		input2value: function() { 
			return {
				old: this.$input.filter('[name="old"]').val(), 
				password: this.$input.filter('[name="password"]').val(), 
				confirm: this.$input.filter('[name="confirm"]').val(), 
			};
		},        

		/**
		Activates input: sets focus on the first field.
		
		@method activate() 
		**/        
		activate: function() {
			this.$input.filter('[name="old"]').focus();
		},  
		
	   /**
		Attaches handler to submit form in case of 'showbuttons=false' mode
		
		@method autosubmit() 
		**/       
		autosubmit: function() {
			this.$input.keydown(function (e) {
				if (e.which === 13) {
					$(this).closest('form').submit();
				}
			});
		}       
	});

Password.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
	clear: true,
	tpl: 
	'<div class="editable-password"><label><span>Old: </span><input type="password" name="old" class="input-small" ></label></div><br>' +
	'<div class="editable-password"><label><span>Password: </span><input type="password" name="password" class="input-small" ></label></div><br>' +
	'<div class="editable-password"><label><span>Confirm: </span><input type="password" name="confirm" class="input-mini" ></label></div>',

	inputclass: ''
});

$.fn.editabletypes.password = Password;

}(window.jQuery));