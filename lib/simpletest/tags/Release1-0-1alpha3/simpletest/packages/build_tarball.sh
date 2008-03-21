#!/bin/sh

# Builds project release.
#
cd ../..

NAME=simpletest_`cat simpletest/VERSION`.tar.gz
FILES=(simpletest/compatibility.php \
          simpletest/collector.php \
          simpletest/dumper.php \
          simpletest/errors.php \
          simpletest/exceptions.php \
          simpletest/expectation.php \
          simpletest/socket.php \
          simpletest/encoding.php \
          simpletest/url.php \
          simpletest/cookies.php \
          simpletest/http.php \
          simpletest/authentication.php \
          simpletest/user_agent.php \
          simpletest/browser.php \
          simpletest/parser.php \
          simpletest/tag.php \
          simpletest/selector.php \
          simpletest/form.php \
          simpletest/frames.php \
          simpletest/page.php \
          simpletest/reflection_php4.php \
          simpletest/reflection_php5.php \
          simpletest/invoker.php \
          simpletest/scorer.php \
          simpletest/reporter.php \
          simpletest/mock_objects.php \
          simpletest/simpletest.php \
          simpletest/test_case.php \
          simpletest/unit_tester.php \
          simpletest/web_tester.php \
          simpletest/shell_tester.php \
          simpletest/xml.php \
          simpletest/detached.php \
          simpletest/remote.php \
          simpletest/extensions/pear_test_case.php \
          simpletest/extensions/phpunit_test_case.php \
          simpletest/README \
          simpletest/VERSION \
          simpletest/LICENSE \
          simpletest/HELP_MY_TESTS_DONT_WORK_ANYMORE \
          simpletest/test/all_tests.php \
          simpletest/test/unit_tests.php \
          simpletest/test/test_groups.php \
          simpletest/test/acceptance_test.php \
          simpletest/test/collector_test.php \
          simpletest/test/simpletest_test.php \
          simpletest/test/errors_test.php \
          simpletest/test/compatibility_test.php \
          simpletest/test/dumper_test.php \
          simpletest/test/expectation_test.php \
          simpletest/test/adapter_test.php \
          simpletest/test/socket_test.php \
          simpletest/test/url_test.php \
          simpletest/test/cookies_test.php \
          simpletest/test/encoding_test.php \
          simpletest/test/http_test.php \
          simpletest/test/authentication_test.php \
          simpletest/test/user_agent_test.php \
          simpletest/test/browser_test.php \
          simpletest/test/parser_test.php \
          simpletest/test/tag_test.php \
          simpletest/test/form_test.php \
          simpletest/test/frames_test.php \
          simpletest/test/page_test.php \
          simpletest/test/reflection_php4_test.php \
          simpletest/test/reflection_php5_test.php \
          simpletest/test/mock_objects_test.php \
          simpletest/test/interfaces_test.php \
          simpletest/test/visual_test.php \
          simpletest/test/shell_test.php \
          simpletest/test/web_tester_test.php \
          simpletest/test/unit_tester_test.php \
          simpletest/test/shell_tester_test.php \
          simpletest/test/xml_test.php \
          simpletest/test/live_test.php \
          simpletest/test/parse_error_test.php \
          simpletest/test/detached_test.php \
          simpletest/test/remote_test.php \
          simpletest/test/test_with_parse_error.php \
          simpletest/test/support/collector/collectable.1 \
          simpletest/test/support/collector/collectable.2 \
          simpletest/test/support/upload_sample.txt \
          simpletest/test/support/supplementary_upload_sample.txt \
          simpletest/test/support/latin1_sample \
          simpletest/test/support/spl_examples.php \
          simpletest/docs/en/docs.css \
          simpletest/docs/en/index.html \
          simpletest/docs/en/overview.html \
          simpletest/docs/en/unit_test_documentation.html \
          simpletest/docs/en/group_test_documentation.html \
          simpletest/docs/en/mock_objects_documentation.html \
          simpletest/docs/en/partial_mocks_documentation.html \
          simpletest/docs/en/reporter_documentation.html \
          simpletest/docs/en/expectation_documentation.html \
          simpletest/docs/en/web_tester_documentation.html \
          simpletest/docs/en/form_testing_documentation.html \
          simpletest/docs/en/authentication_documentation.html \
          simpletest/docs/en/browser_documentation.html \
          simpletest/docs/fr/docs.css \
          simpletest/docs/fr/index.html \
          simpletest/docs/fr/overview.html \
          simpletest/docs/fr/unit_test_documentation.html \
          simpletest/docs/fr/group_test_documentation.html \
          simpletest/docs/fr/server_stubs_documentation.html \
          simpletest/docs/fr/mock_objects_documentation.html \
          simpletest/docs/fr/partial_mocks_documentation.html \
          simpletest/docs/fr/reporter_documentation.html \
          simpletest/docs/fr/expectation_documentation.html \
          simpletest/docs/fr/web_tester_documentation.html \
          simpletest/docs/fr/form_testing_documentation.html \
          simpletest/docs/fr/authentication_documentation.html \
          simpletest/docs/fr/browser_documentation.html)

tar -zcf $NAME ${FILES[*]}
