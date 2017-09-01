// scripts/partnerMetaData.js
(function(){

    'use strict';

    angular
        .module('formlyApp')
        .factory('partnerMetaData', partnerMetaData);

        function partnerMetaData() {
            function getPartnerType() {
                return [
                    {
                        "name": "Cluster NGO partner",
                        "value":"Cluster_NGO_partner"
                    },
                    {
                        "name":"Corporate implementation partner",
                        "value":"Corporate_implementation_partner"
                    },
                    {
                        "name":"Participative partner with self-sustenance",
                        "value":"Participative_partner_with_self-sustenance"
                    },
                    {
                        "name":"Fully funded project implementation partner",
                        "value":"Fully_funded_project_implementation_partner"
                    },
                 ];
            }
			function getNGOStatusList() {
                return [
                    {
                        "name": "Trust",
                        "value":"trust"
                    },
                    {
                        "name":"Society",
                        "value":"society"
                    },
                    {
                        "name":"Proprietorship",
                        "value":"proprietorship"
                    },
                    {
                        "name":"unregistered entity",
                        "value":"unregistered_entity"
                    },
                 ];
            }

            return {
				getPartnerType: getPartnerType,
                getNGOStatusList: getNGOStatusList
            }
        }

})();