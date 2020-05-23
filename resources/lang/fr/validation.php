<?php

return [
    /*
  |--------------------------------------------------------------------------
  | Validation Language Lines
  |--------------------------------------------------------------------------
  |
  | Le following language lines contain Le default error messages used by
  | Le validator class. Some of Lese rules have multiple versions such
  | as Le size rules. Feel free to tweak each of Lese messages here.
  |
  */

    'accepted' => 'le :attribute doit être accepté.',
    'active_url' => 'lee :attribute n\'est pas une URL valide.',
    'after' => 'Le :attribute doit être une date après :date.',
    'after_or_equal' => 'Le :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le :attribute ne peut contenir que des lettres.',
    'alpha_dash' => 'Le :attribute ne peut contenir que des lettres, des chiffres, des tirets et des traits de soulignement.',
    'alpha_num' => 'Le :attribute ne peut contenir que des lettres et des chiffres.',
    'array' => 'Le :attribute doit être un tableau.',
    'before' => 'Le :attribute doit être une date antérieure :date.',
    'before_or_equal' => 'Le :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le :attribute  Doit être entre :min et :max.',
        'file' => 'Le :attribute Doit être entre :min et :max kilo-octets.',
        'string' => 'Le :attribute Doit être entre :min et :max personnages.',
        'array' => 'Le :attribute doit avoir entre :min et :max articles.',
    ],
    'boolean' => 'Le :attribute champ doit être vrai ou faux.',
    'confirmed' => 'Le :attribute la confirmation ne correspond pas.',
    'date' => 'Le :attribute la date n\'est pas valide.',
    'date_equals' => 'Le :attribute doit être une date égale à :date.',
    'date_format' => 'Le :attribute ne correspond pas au format :format.',
    'different' => 'Le :attribute et :oLer doit être différent.',
    'digits' => 'Le :attribute doit être :digits chiffres.',
    'digits_between' => 'Le :attribute Doit être entre :min et :max chiffres.',
    'dimensions' => 'Le :attribute a des dimensions d\'image non valides.',
    'distinct' => 'Le :attribute le champ a une valeur en double.',
    'email' => 'Le :attribute Doit être une adresse e-mail valide.',
    'ends_with' => 'Le :attribute doit se terminer par l\'un des following: :values.',
    'exists' => 'Le choisie :attribute est invalide.',
    'file' => 'Le :attribute doit être un fichier.',
    'filled' => 'Le :attribute le champ doit avoir une valeur.',
    'gt' => [
        'numeric' => 'Le :attribute doit être supérieur à :value.',
        'file' => 'Le :attribute doit être supérieur à :value kilo-octets.',
        'string' => 'Le :attribute doit être supérieur à :value personnages.',
        'array' => 'Le :attribute doit avoir plus de :value articles.',
    ],
    'gte' => [
        'numeric' => 'Le :attribute doit être supérieur ou égal :value.',
        'file' => 'Le :attribute doit être supérieur ou égal :value kilo-octets.',
        'string' => 'Le :attribute doit être supérieur ou égal :value personnages.',
        'array' => 'Le :attribute doit avoir :value articles ou plus.',
    ],
    'image' => 'Le :attribute doit être une image.',
    'in' => 'Le selected :attribute is invalid.',
    'in_array' => 'Le :attribute field does not exist in :oLer.',
    'integer' => 'Le :attribute must be an integer.',
    'ip' => 'Le :attribute must be a valid IP address.',
    'ipv4' => 'Le :attribute must be a valid IPv4 address.',
    'ipv6' => 'Le :attribute must be a valid IPv6 address.',
    'json' => 'Le :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'Le :attribute must be less than :value.',
        'file' => 'Le :attribute must be less than :value kilobytes.',
        'string' => 'Le :attribute must be less than :value characters.',
        'array' => 'Le :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Le :attribute must be less than or equal :value.',
        'file' => 'Le :attribute must be less than or equal :value kilobytes.',
        'string' => 'Le :attribute must be less than or equal :value characters.',
        'array' => 'Le :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Le :attribute may not be greater than :max.',
        'file' => 'Le :attribute may not be greater than :max kilobytes.',
        'string' => 'Le :attribute may not be greater than :max characters.',
        'array' => 'Le :attribute may not have more than :max items.',
    ],
    'mimes' => 'Le :attribute must be a file of type: :values.',
    'mimetypes' => 'Le :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Le :attribute must be at least :min.',
        'file' => 'Le :attribute must be at least :min kilobytes.',
        'string' => 'Le :attribute must be at least :min characters.',
        'array' => 'Le :attribute must have at least :min items.',
    ],
    'not_in' => 'Le selected :attribute is invalid.',
    'not_regex' => 'Le :attribute format is invalid.',
    'numeric' => 'Le :attribute doit être un nombrer.',
    'password' => 'Le mot de passe est incorrect.',
    'present' => 'Le :attribute field must be present.',
    'regex' => 'Le :attribute format is invalid.',
    'required' => 'Le :attribute field is required.',
    'required_if' => 'Le :attribute field is required when :oLer is :value.',
    'required_unless' => 'Le :attribute field is required unless :oLer is in :values.',
    'required_with' => 'Le :attribute field is required when :values is present.',
    'required_with_all' => 'Le :attribute field is required when :values are present.',
    'required_without' => 'Le :attribute field is required when :values is not present.',
    'required_without_all' => 'Le :attribute field is required when none of :values are present.',
    'same' => 'Le :attribute and :oLer must match.',
    'size' => [
        'numeric' => 'Le :attribute must be :size.',
        'file' => 'Le :attribute must be :size kilobytes.',
        'string' => 'Le :attribute must be :size characters.',
        'array' => 'Le :attribute must contain :size items.',
    ],
    'starts_with' => 'Le :attribute must start with one of Le following: :values.',
    'string' => 'Le :attribute must be a string.',
    'timezone' => 'Le :attribute must be a valid zone.',
    'unique' => 'Le :attribute has already been taken.',
    'uploaded' => 'Le :attribute failed to upload.',
    'url' => 'Le :attribute format is invalid.',
    'uuid' => 'Le :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using Le
    | convention "attribute.rule" to name Le lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Le following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
