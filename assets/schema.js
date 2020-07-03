{
    "users": {
        "user.id": "null",
        "user.type": {
            "type": "int",
            "length": "3",
            "null": false
        },
        "user.role": {
            "type": "int",
            "length": "3",
            "null": false,
            "default": "0"
        },
        "user.company_id": {
            "type": "int",
            "length": "3",
            "null": false
        },
        "user.code": {
            "type": "varchar",
            "length": "10",
            "null": true
        },
        "user.created_at": {
            "type": "date",
            "length": "10",
            "null": false
        },
        "user.first_name": {
            "type": "varchar",
            "length": "50",
            "null": false
        },
        "user.middle_name": {
            "type": "varchar",
            "length": "50",
            "null": false
        },
        "user.last_name": {
            "type": "varchar",
            "length": "50",
            "null": false
        },
        "user.dob": {
            "type": "date",
            "length": "10",
            "null": false
        },
        "user.marital_status": {
            "type": "int",
            "length": "1",
            "null": false
        },
        "user.gender": {
            "type": "int",
            "length": "1",
            "null": false
        },
        "user.email": {
            "type": "varchar",
            "length": "100",
            "null": false
        },
        "user.email_secondary": {
            "type": "varchar",
            "length": "100",
            "null": true
        },
        "user.password": {
            "type": "varchar",
            "length": "255",
            "null": false
        },
        "user.has_criminal_record": {
            "type": "int",
            "length": "1",
            "null": false,
            "default": "0"
        },
        "user.criminal_record_detail": {
            "type": "text",
            "length": "2000",
            "null": true,
            "default": true
        },
        "user.officials": {
			"has_one" : "true",
            "official.id": {
                "type": "int",
                "length": "1",
                "null": false,
                "default": "0",
                "alias": "official.id as official_id"
            },
            "official.employment_type": {
                "type": "int",
                "length": "1",
                "null": false,
                "default": "0"
            },
            "official.joining_date": {
                "type": "varchar",
                "length": "10",
                "null": false,
                "default": "0"
            },
            "official.exit_date": {
                "type": "varchar",
                "length": "10",
                "null": false,
                "default": "0"
            },
            "official.exit_date_of_previous_employer": {
                "type": "varchar",
                "length": "10",
                "null": false,
                "default": "0"
            },
            "official.working_hours_from": {
                "type": "varchar",
                "length": "10",
                "null": false,
                "default": "10:00 AM"
            },
            "official.working_hours_to": {
                "type": "varchar",
                "length": "10",
                "null": false,
                "default": "8:00 PM"
            },
            "official.status": {
                "type": "int",
                "length": "1",
                "null": false,
                "default": "1"
            },
            "official.is_archieved": {
                "type": "int",
                "length": "1",
                "null": true,
                "default": "0"
            }
        },
        "user.addresses": [
			{
                "address.id": {
                    "type": "int",
                    "length": "10",
                    "null": false,
                    "alias": "address.id as address_id"
                },
                "address.user_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.address": {
                    "type": "varchar",
                    "length": "250",
                    "null": false
                },
                "address.country_id": {
                    "type": "int",
                    "length": "3",
                    "null": "true"
                },
                "address.state_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.city_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.zipcode": {
                    "type": "int",
                    "length": "6",
                    "null": false
                },
                "address.type": {
                    "type": "int",
                    "length": "1",
                    "null": false
                }
            },
            {
                "address.id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.user_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.address": {
                    "type": "varchar",
                    "length": "250",
                    "null": false
                },
                "address.country_id": {
                    "type": "int",
                    "length": "3",
                    "null": "true"
                },
                "address.state_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.city_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "address.zipcode": {
                    "type": "int",
                    "length": "6",
                    "null": false
                },
                "address.type": {
                    "type": "int",
                    "length": "1",
                    "null": false
                },
				"address.status": {
                    "type": "int",
                    "length": "14",
                    "null": true,
					"alias" : "address.status as address_status"
                },
				"address.sort_order": {
                    "type": "int",
                    "length": "2",
                    "null": true,
					"alias" : "address.sort_order as address_sort_order"
                },
				"address.created_on": {
					"type": "timestamp",
					"length": "20",
					"null": true,
					"alias" : "address.created_on as address_created_on"
				},
				"address.created_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"address.updated_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"address.updated_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				}
            }
        ],
        "user.contacts":[
			{"belongs_to" : "contact_types" },
			{
                "contact.id": {
                    "type": "int",
                    "length": "10",
                    "null": false,
                    "alias": "contact.id as contact_id"
                },
                "contact.user_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "contact.contact_type_id": {
                    "type": "int",
                    "length": "2",
                    "null": false
                },
                "contact.contact": {
                    "type": "int",
                    "length": "14",
                    "null": true
                },
               "contact.status": {
                    "type": "int",
                    "length": "14",
                    "null": true
                },
				"contact.sort_order": {
                    "type": "int",
                    "length": "2",
                    "null": true
                },
				"created_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"created_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				}
            },
            {
                "contact.id": {
                    "type": "int",
                    "length": "10",
                    "null": false,
                    "alias": "contact.id as contact_id"
                },
                "contact.user_id": {
                    "type": "int",
                    "length": "10",
                    "null": false
                },
                "contact.contact_type_id": {
                    "type": "int",
                    "length": "2",
                    "null": false
                },
                "contact.contact": {
                    "type": "int",
                    "length": "14",
                    "null": true
                },
                "contact.status": {
                    "type": "int",
                    "length": "14",
                    "null": true
                },
				"contact.sort_order": {
                    "type": "int",
                    "length": "2",
                    "null": true
                },
				"created_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"created_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				}
            }
        ],
        "user.educations": [
            {
                "education.id": {
                    "type": "int",
                    "length": "14",
                    "null": false,
                    "alias": "education.id as education_id"
                },
                "education.name": {
                    "type": "int",
                    "length": "14",
                    "null": true
                },
                "education.school": {
                    "type": "varchar",
                    "length": "250",
                    "null": true
                },
                "education.university": {
                    "type": "varchar",
                    "length": "250",
                    "null": true
                },
                "education.degree": {
                    "type": "int",
                    "length": "2",
                    "null": true
                },
                "education.stream": {
                    "type": "int",
                    "length": "2",
                    "null": true
                },
                "education.specials": {
                    "type": "varchar",
                    "length": "255",
                    "null": true
                },
                "education.obtained_grade": {
                    "type": "varchar",
                    "length": "255",
                    "null": true
                },
                "education.grade_type": {
                    "type": "varchar",
                    "length": "255",
                    "null": true
                },
                "education.year": {
                    "type": "int",
                    "length": "4",
                    "null": true
                },
                "education.month": {
                    "type": "int",
                    "length": "2",
                    "null": true
                },
				"created_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"created_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_on": {
					"type": "timestamp",
					"length": "20",
					"null": true
				},
				"updated_by": {
					"type": "timestamp",
					"length": "20",
					"null": true
				}
            }
        ]
    },
    "contact_types": {
        "id": {
            "type": "int",
            "length": "2",
            "null": true
        },
        "status": {
            "type": "int",
            "length": "1",
            "null": true
        },
        "is_archieved": {
            "type": "int",
            "length": "1",
            "null": true
        },
		"created_on": {
            "type": "timestamp",
            "length": "20",
            "null": true
        },
        "created_by": {
            "type": "timestamp",
            "length": "20",
            "null": true
        },
        "updated_on": {
            "type": "timestamp",
            "length": "20",
            "null": true
        },
        "updated_by": {
            "type": "timestamp",
            "length": "20",
            "null": true
        }
    }
}