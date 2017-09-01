// scripts/MainController.js
(function() {

    'use strict';
	//var formlyApp = angular.module('formlyApp');
	//console.log(formlyApp);
    angular
        .module('formlyApp')
        .controller('MainController', MainController, '$http', '$scope');

    function MainController($scope, province, partnerMetaData, $http) {


		var vm = this;
	  console.log($scope);
    // The model object that we reference
    // on the  element in index.html
    vm.partner = {};
    vm.onSubmit = onSubmit;
    // An array of our form fields with configuration
    // and options set. We make reference to this in
    // the 'fields' attribute on the  element
    vm.partnerFields = [
        {
            key: 'partner_type',
			//placeholder: 'Select Partner Type',
            type: 'select',
            templateOptions: {
                label: 'Partner Type',
				// Call our province service to get a list
				// of provinces and territories
				options: partnerMetaData.getPartnerType()
           }
        },
		//legal_name for partner and corporate_legal_name for corporate partner
        {
            key: 'legal_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Legal Name',
                placeholder: 'Enter partner Legal Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
            hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'corporate_legal_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Company Legal Name',
                placeholder: 'Enter partner Company Legal Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		//ngo_status for partner and csr_director_name for corporate partner
        {
            key: 'ngo_status',
            type: 'select',
            templateOptions: {
                label: 'NGO Status',
				// Call our province service to get a list
				// of provinces and territories
				options: partnerMetaData.getNGOStatusList()
				},
			// Hide this field if we don't have
			// any valid input in the email field
            hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'csr_director_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'CSR Director Name',
                placeholder: 'CSR Director Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		//ho_location and ho_address for partner and csr_director_name for corporate partner
        {
            key: 'ho_location',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Location',
                placeholder: 'Partner Head Office Location',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
            hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'ho_address',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Address',
                placeholder: 'Partner Head Office Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'csr_director_mobile',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'CSR Director Mobile',
                placeholder: 'CSR Director Mobile',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		{
            key: 'csr_director_email',
            type: 'input',
            templateOptions: {
                type: 'email',
                label: 'CSR Director Email address',
                placeholder: 'CSR Director email',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		//key_trustee_name trustee_contact_mobile and trustee_email for partner and number of locations available with ready CSR centres, approved by your company, CSR rep names for each location for corporate partner
        {
            key: 'key_trustee_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Key Trustee Name',
                placeholder: 'Enter Key Trustee Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'trustee_contact_mobile',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Contact Phone',
                placeholder: 'Enter Key Trustee Contact Mobile Number',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
        {
            key: 'trustee_email',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Email',
                placeholder: 'Enter Key Trustee Email Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
        },
		{
            key: 'number_csr_locations',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Number of locations available with ready CSR center at factory locations',
                placeholder: 'Enter Number of locations available with ready CSR center at factory locations',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		{
            key: 'number_shareable_csr_locations',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Number of locations approved by your company for sharing of CSR centers for HHH MIC Program',
                placeholder: 'Enter Number of locations approved by your company for sharing of CSR centers for HHH MIC Program',
                required: true
            },
			   // Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		{
        type: 'repeatSection',
        key: 'location_reps',
        templateOptions: {
          btnText: 'Add another location rep',
          fields: [{
			className: "row",
            fieldGroup: [{
				className: "col-xs-6",
                key: 'location_csr_rep_name',
				type: 'input',
				templateOptions: {
					label: 'Location CSR Representative Name'
				}
			},
			{
				className: "col-xs-6",
                key: 'location_csr_rep_email',
				type: 'input',
				templateOptions: {
					label: 'Location CSR Representative Email'
				}
			}]
		  }]

        },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
      },
	  {
		  'key': 'modelName',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'partner to any other program like DDU-GKY, NSDC, PMKY?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field

			hideExpression: '!model.partner_type || model.partner_type != "Cluster_NGO_partner"'
		},
        {
            key: 'p_legal_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Legal Name',
                placeholder: 'Enter Legal Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'p_ngo_status',
            type: 'select',
            templateOptions: {
                label: 'NGO Status',
				// Call our province service to get a list
				// of provinces and territories
				options: partnerMetaData.getNGOStatusList()
				},
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
		//ho_location and ho_address for partner and csr_director_name for corporate partner
        {
            key: 'p_ho_location',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Location',
                placeholder: 'Partner Head Office Location',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'p_ho_address',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Address',
                placeholder: 'Partner Head Office Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'p_key_trustee_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Key Trustee Name',
                placeholder: 'Enter Key Trustee Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'p_trustee_contact_mobile',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Contact Phone',
                placeholder: 'Enter Key Trustee Contact Mobile Number',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'p_trustee_email',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Email',
                placeholder: 'Enter Key Trustee Email Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
		{
            key: 'number_center_to_start',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'How many centres you want to start?',
                placeholder: 'Enter Number of centres you want to start under HHH MIC Program',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
        {
            key: 'f_legal_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Legal Name',
                placeholder: 'Enter Legal Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
        {
            key: 'f_ngo_status',
            type: 'select',
            templateOptions: {
                label: 'NGO Status',
				// Call our province service to get a list
				// of provinces and territories
				options: partnerMetaData.getNGOStatusList()
				},
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
		//ho_location and ho_address for partner and csr_director_name for corporate partner
        {
            key: 'f_ho_location',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Location',
                placeholder: 'Partner Head Office Location',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
        {
            key: 'f_ho_address',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'HO Address',
                placeholder: 'Partner Head Office Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
        {
            key: 'f_key_trustee_name',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Key Trustee Name',
                placeholder: 'Enter Key Trustee Name',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
        {
            key: 'f_trustee_contact_mobile',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Contact Phone',
                placeholder: 'Enter Key Trustee Contact Mobile Number',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
        {
            key: 'f_trustee_email',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Trustee Email',
                placeholder: 'Enter Key Trustee Email Address',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
		{
            key: 'number_center_ready_with_facilities',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'number of centres that are ready with student hostel and dining facilities',
                placeholder: 'Enter Number of centres that are ready with student hostel and dining facilities',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
        },
		{
            key: 'spectfic_instruction_to_HHH',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'any specific instructions by your organization to HHH',
                placeholder: 'any specific instructions by your organization to HHH',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
        },
		{
            key: 'number_of_staff_to_be_nominated_for_TTT_at_Tumkur',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'how many your own staff can be nominated for TTT at Tumkur?',
                placeholder: 'Enter Number of your own staff can be nominated for TTT at Tumkur',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
		{
		  'key': 'discussed_approximate_cost_per_student_in_residential_format',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'Have you discussed with HHH on approximate cost per student per month of residential format?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
		},
		{
		  'key': 'csr_budgets_available_this_FY_for_trainer_salaries',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'CSR budgets available for this FY for funding trainer salaries?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
		},
		{
		  'key': 'other_temp_staff_to_help_HHH_student_mobilization',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'do you have other NGOs or temporary staff that can help HHH in student mobilization?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
		},
		{
		  'key': 'template_for_data_collection_from_MIC',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'do you have any specific templates for monthly data capture from MIC program?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Corporate_implementation_partner"'
		},
		{
            key: 'it_infra_readiness_for_MIC',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'By when can you have the suggested IT infra ready for MIC program?',
                placeholder: 'By when can you have the suggested IT infra ready for MIC program',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        },
		{
		  'key': 'accomodation_to_HHH_Trainer_at_no_cost',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'Can you provide accommodation to HHH trainer at no cost?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
		},
		{
		  'key': 'domain_technical_training_to_add_to_MIC_program',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'do you have any specific domain or technical training that you want to add to MIC program?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
		},
		{
		  'key': 'discussed_cost_of_mobilization_for_MIC_program',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'Have you discussed with HHH rep on approximate one-time costs, opex costs or cost of mobilization for MIC prorgam?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
		},
		{
		  'key': 'dedicated_project_manager_for_HHH_program',
		  'type': 'radio',
		  'templateOptions': {
			'label': 'can you devote one dedicated project manager for this HHH project?',
			'disabled': false,
			'required': false,
			'options': [{
			  'name': 'YES',
			  'value': 'yes', // ng-value
			  'description': 'Yes',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			},{
			  'name': 'NO',
			  'value': 'no', // ng-value
			  'description': 'No',
			  'checked': false, // ng-checked
			  'disabled': false, // ng-disabled
			  'inline': false
			}]
		  },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Fully_funded_project_implementation_partner"'
		},
		{
            key: 'domain_details_number_training_hours_needed',
            type: 'input',
            templateOptions: {
                type: 'text',
                label: 'Provide details of this domain and number of training hours needed for this module',
                placeholder: 'Provide details of this domain and number of training hours needed for this module',
                required: true
            },
			// Hide this field if we don't have
			// any valid input in the email field
			hideExpression: '!model.partner_type || model.partner_type != "Participative_partner_with_self-sustenance"'
        }
    ];
function onSubmit() {


     var user_data = 'partner_type='+vm.partner.partner_type+'&legal_name=' + vm.partner.legal_name+'&ngo_status=' + vm.partner.ngo_status+'&ho_location=' + vm.partner.ho_location+'&ho_address=' + vm.partner.ho_address+'&key_trustee_name=' + vm.partner.key_trustee_name+'&trustee_contact_mobile=' + vm.partner.trustee_contact_mobile+'&trustee_email=' + vm.partner.trustee_email+'&corporate_legal_name=' + vm.partner.corporate_legal_name+'&csr_director_name=' + vm.partner.csr_director_name+'&csr_director_mobile=' + vm.partner.csr_director_mobile+'&number_csr_locations=' + vm.partner.number_csr_locations+'&number_shareable_csr_locations=' + vm.partner.number_shareable_csr_locations+'&spectfic_instruction_to_HHH=' + vm.partner.	spectfic_instruction_to_HHH+'&	csr_budgets_available_this_FY_for_trainer_salaries=' + vm.partner.csr_budgets_available_this_FY_for_trainer_salaries+'&modelName=' + vm.partner.modelName+'&other_temp_staff_to_help_HHH_student_mobilization=' + vm.partner.other_temp_staff_to_help_HHH_student_mobilization+'&template_for_data_collection_from_MIC=' + vm.partner.template_for_data_collection_from_MIC+'&csr_director_email=' + vm.partner.csr_director_email+'&number_center_ready_with_facilities=' + vm.partner.number_center_ready_with_facilities+'&discussed_approximate_cost_per_student_in_residential_format=' + vm.partner.discussed_approximate_cost_per_student_in_residential_format+'&accomodation_to_HHH_Trainer_at_no_cost=' + vm.partner.accomodation_to_HHH_Trainer_at_no_cost+'&discussed_cost_of_mobilization_for_MIC_program=' + vm.partner.discussed_cost_of_mobilization_for_MIC_program+'&dedicated_project_manager_for_HHH_program=' + vm.partner.dedicated_project_manager_for_HHH_program+'&f_legal_name=' + vm.partner.f_legal_name+'&f_ngo_status=' + vm.partner.f_ngo_status+'&f_ho_location=' + vm.partner.f_ho_location+'&f_ho_address=' + vm.partner.f_ho_address+'&f_key_trustee_name=' + vm.partner.f_key_trustee_name+'&f_trustee_contact_mobile=' + vm.partner.f_trustee_contact_mobile+'&f_trustee_email=' + vm.partner.f_trustee_email+'&p_legal_name=' + vm.partner.p_legal_name+'&p_ngo_status=' + vm.partner.p_ngo_status+'&p_ho_location=' + vm.partner.p_ho_location+'&p_ho_address=' + vm.partner.p_ho_address+'&p_key_trustee_name=' + vm.partner.p_key_trustee_name+'&p_trustee_contact_mobile=' + vm.partner.p_trustee_contact_mobile+'&p_trustee_email=' + vm.partner.p_trustee_email+'&location_csr_rep_name=' + vm.partner.location_csr_rep_name+'&location_csr_rep_email=' + vm.partner.location_csr_rep_email;



    $http({
      method: 'POST',
      url: 'save_partners.php',
      data: user_data,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'}
    })
    /*.success(function(data) {
        console.log(data);
				if ( data.trim() === 'correct') {
					window.location.href = 'index.php';
				} else {
					$scope.errorMsg = "Failed";
				}
			})*/

      alert("Success");
      console.log("got it");


    }
    }

})();
