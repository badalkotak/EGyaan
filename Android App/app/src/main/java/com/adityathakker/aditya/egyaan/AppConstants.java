package com.adityathakker.aditya.egyaan;

/**
 * Created by adityajthakker on 27/4/16.
 */
public abstract class AppConstants {

    public static class DatabaseConstants {
        public static final String DATABASE_NAME = "EGyaan";
        public static final String OFFLINE_DOUBT_TABLE_NAME = "offline_doubts";
        public static final String OFFLINE_DOUBT_KEY_ID = "id";
        public static final String OFFLINE_DOUBT_KEY_DOUBT = "doubt";
        public static final String OFFLINE_DOUBT_KEY_ANSWER = "answer";
        public static final String OFFLINE_DOUBT_KEY_STUDENT_FILE = "student_file";
        public static final String OFFLINE_DOUBT_KEY_TEACHER_FILE = "teacher_file";
        public static final String CREATE_OFFLINE_DOUBT_TABLE = "CREATE TABLE " + OFFLINE_DOUBT_TABLE_NAME +
                "(" +
                OFFLINE_DOUBT_KEY_ID + " integer primary key," +
                OFFLINE_DOUBT_KEY_DOUBT + " text not null," +
                OFFLINE_DOUBT_KEY_ANSWER + " text," +
                OFFLINE_DOUBT_KEY_STUDENT_FILE + " text," +
                OFFLINE_DOUBT_KEY_TEACHER_FILE + " text)";
        public static final String DROP_OFFLINE_DOUBT_TABLE = "DROP TABLE IF EXISTS " + OFFLINE_DOUBT_TABLE_NAME;
    }
    
    public static class SharedPrefs {
        public static final String NAME = "EGyaan";
        public static final String ALREADY_LOGGEN_IN = "already_logged_in";
        public static final String IS_FIRST_TIME_STARTED = "is_first_time_started";
    }
    
    public static class URLs {
        public static final String LOGIN_CHECKER = "http://192.168.1.100/egyaan/loginChecker.php";
        public static final String VIEW_DOUBTS = "http://192.168.1.100/egyaan/viewDoubts.php";
        public static final String BASE_URL = "http://192.168.1.100/egyaan/";
    }

    public static class ResponseCodes {
        public static final String LOGIN_NO_EMAIL_PASSWORD = "no_email_password";
        public static final String LOGIN_FAILED =  "login_failed";
        public static final String LOGIN_SUCCESSFUL =  "login_successful";
        public static final String LOGIN_NO_ACCOUNT = "no_such_account";
        public static final String LOGIN_VALUE_ACCOUNT_TYPE_PARENT = "parent";
        public static final String LOGIN_VALUE_ACCOUNT_TYPE_STUDENT = "student";
        public static final String LOGIN_KEY_STATUS = "status";
        public static final String LOGIN_KEY_MESSAGE = "message";
        public static final String LOGIN_KEY_UID = "uid";
        public static final String LOGIN_KEY_PARENT_EMAIL = "parent_email";
        public static final String LOGIN_KEY_STUDENT_EMAIL = "student_email";
        public static final String LOGIN_KEY_ACCOUNT_TYPE = "accountType";
        public static final String LOGIN_KEY_STUDENT_FNAME = "student_fname";
        public static final String LOGIN_KEY_STUDENT_LNAME = "student_lname";
        public static final String LOGIN_KEY_PARENT_LNAME = "parent_lname";
        public static final String LOGIN_KEY_PARENT_FNAME = "parent_fname";
        public static final String LOGIN_KEY_MOBILE_NO = "mobile_no";
        public static final String LOGIN_KEY_ADDRESS = "address";
        public static final String LOGIN_KEY_BRANCH = "branch";
        public static final String LOGIN_KEY_GENDER = "gender";
        public static final String SOMETHING_WENT_WRONG = "Something Went Wrong";

    }
}
