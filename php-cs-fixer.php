<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    'array_syntax' => ['syntax' => 'short'],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    //TODO: Maybe we'll want this in the future, but looks weird imo atm
    // 'cast_spaces' => true,
    'concat_space' => [
        'spacing' => 'none',
    ],
    'declare_equal_normalize' => true,
    'elseif' => true,
    'encoding' => true,
    'full_opening_tag' => true,
    'fully_qualified_strict_types' => true, // added by Shift
    'function_declaration' => true,
    'type_declaration_spaces' => true, // Replaces 'function_typehint_space'
    'heredoc_to_nowdoc' => true,
    'include' => true,
    'increment_style' => ['style' => 'post'],
    'indentation_type' => true,
    'linebreak_after_opening_tag' => true,
    'line_ending' => true,
    'lowercase_cast' => true,
    'lowercase_keywords' => true,
    'lowercase_static_reference' => true, // added from Symfony
    'magic_method_casing' => true, // added from Symfony
    'magic_constant_casing' => true,
    'method_argument_space' => true,
    'native_function_casing' => true,
    'no_alias_functions' => true,
    'no_extra_blank_lines' => [
        'tokens' => [
            'extra',
            'throw',
            'use',
            // 'use_trait' removed, now handled by 'class_attributes_separation'
        ],
    ],
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_closing_tag' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print' => [
        'use' => 'echo',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
    ],
    'no_short_bool_cast' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'spaces_inside_parentheses' => true, // Replaces 'no_spaces_inside_parenthesis'
    'no_trailing_comma_in_singleline' => true, // Replaces both 'no_trailing_comma_in_list_call' and 'no_trailing_comma_in_singleline_array'
    'no_trailing_whitespace' => true,
    'no_trailing_whitespace_in_comment' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'no_whitespace_in_blank_line' => true,
    'normalize_index_brace' => true,
    //TODO: Maybe we'll want this in the future, but looks weird imo atm
    // 'not_operator_with_successor_space' => true,
    'object_operator_without_whitespace' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_access' => true,
    'phpdoc_no_package' => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_scalar' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_summary' => true,
    'phpdoc_to_comment' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'phpdoc_var_without_name' => true,
    'self_accessor' => true,
    'short_scalar_cast' => true,
    'simplified_null_return' => false, // disabled by Shift
    'single_blank_line_at_eof' => true,
    'blank_lines_before_namespace' => true, // Replaces 'single_blank_line_before_namespace'
    'single_import_per_statement' => true,
    'single_line_after_imports' => true,
    'single_line_comment_style' => [
        'comment_types' => ['hash'],
    ],
    //TODO: Maybe we'll want this in the future, but looks weird imo atm
    // 'single_quote' => true,
    'space_after_semicolon' => true,
    'standardize_not_equals' => true,
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'ternary_operator_spaces' => true,
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'whitespace_after_comma_in_array' => true,

    // php-cs-fixer 3: Renamed rules
    'constant_case' => ['case' => 'lower'],
    'general_phpdoc_tag_rename' => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_tag_type' => true,
    'psr_autoloading' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays']],

    // php-cs-fixer 3: Changed options
    'binary_operator_spaces' => [
        'default' => 'single_space',
        'operators' => ['=>' => null],
    ],
    // TODO: Review this? So far we don't have such rule in JS code, so leaving it off though it might generate cleaner code
    // TODO: Also seems not to be fully consistent. EG: ListsHelperServiceProvider post-fix (messes up readability for functions with early exists)
    // 'blank_line_before_statement' => [
    // 'statements' => ['return'],
    // ],
    'class_attributes_separation' => [
        'elements' => [
            'const' => 'none',       // No blank line before/after const declarations. TODO: Run one time on none then remove it entirely?
            'method' => 'one',       // One blank line before/after methods
            'property' => 'one',     // One blank line before/after properties
            'trait_import' => 'one', // One blank line before/after trait imports
        ],
    ],
    'class_definition' => [
        'multi_line_extends_each_single_line' => true,
        'single_item_single_line' => true,
        'single_line' => true,
    ],
    //TODO: Maybe we'll want this in the future, but looks weird imo atm
    //    'ordered_imports' => [
    //        'sort_algorithm' => 'alpha',
    //    ],

    // php-cs-fixer 3: Removed rootless options (*)
    'no_unneeded_control_parentheses' => [
        'statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield'],
    ],
    'no_spaces_around_offset' => [
        'positions' => ['inside', 'outside'],
    ],
    'visibility_required' => [
        'elements' => ['property', 'method', 'const'],
    ],
];

$finder = Finder::create()
    ->in([
        __DIR__.'/app',
        __DIR__.'/config',
        __DIR__.'/database',
        __DIR__.'/resources',
        __DIR__.'/routes',
        __DIR__.'/tests',
    ])
    ->exclude(['migrations','seeders'])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new Config())
    ->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true);
