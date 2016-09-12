package com.adityathakker.aditya.egyaan.ui;

import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.adityathakker.aditya.egyaan.AppConstants;
import com.adityathakker.aditya.egyaan.R;
import com.adityathakker.aditya.egyaan.model.LoginJModel;
import com.adityathakker.aditya.egyaan.net.APICalls;
import com.adityathakker.aditya.egyaan.utils.CommonTasks;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class LoginActivity extends AppCompatActivity implements View.OnClickListener{

    private static final String TAG = LoginActivity.class.getSimpleName();
    SharedPreferences sharedPreferences;
    EditText email,password;
    Button login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        sharedPreferences = this.getSharedPreferences(AppConstants.SharedPrefs.NAME, MODE_PRIVATE);

        if(isAlreadyLoggedIn(sharedPreferences)){
            //If user is already logged in then
            if (sharedPreferences.getString(AppConstants.ResponseCodes.LOGIN_KEY_ACCOUNT_TYPE, null).equals(AppConstants.ResponseCodes.LOGIN_VALUE_ACCOUNT_TYPE_STUDENT)) {
                startActivity(new Intent(this, StudentHomeActivity.class));
            } else {
                startActivity(new Intent(this, ParentHomeActivity.class));
            }
            finish();
        }

        email = (EditText) this.findViewById(R.id.activity_login_email);
        password = (EditText) this.findViewById(R.id.activity_login_password);
        login = (Button) this.findViewById(R.id.activity_login_button);

        login.setOnClickListener(this);

    }

    private boolean isAlreadyLoggedIn(SharedPreferences sharedPreferences){
        if (sharedPreferences.getBoolean(AppConstants.SharedPrefs.ALREADY_LOGGEN_IN, false)) {
            return true;
        }else{
            return false;
        }
    }

    @Override
    public void onClick(View view) {
        switch (view.getId()){
            case R.id.activity_login_button:
                performLoginAction();
        }
    }

    private void performLoginAction() {
        final String emailText = email.getText().toString().trim();
        String passwordText = password.getText().toString().trim();

        if(CommonTasks.haveNetworkConnection(this)){
            //Internet is Available
            if(!emailText.equals("") && !passwordText.equals("")){
                Retrofit retrofit = new Retrofit.Builder().baseUrl(AppConstants.URLs.BASE_URL).addConverterFactory(GsonConverterFactory.create()).build();


                APICalls apiCalls = retrofit.create(APICalls.class);

                Call<LoginJModel> loginJModelCall = apiCalls.getLoginStatus(emailText, passwordText);
                loginJModelCall.enqueue(new Callback<LoginJModel>() {
                    @Override
                    public void onResponse(Call<LoginJModel> call, Response<LoginJModel> response) {
                        if (response.body().getStatus().equals(AppConstants.ResponseCodes.LOGIN_SUCCESSFUL)) {
                            putValuesToSharedPrefs(response.body(), emailText);
                            if (response.body().getAccountType().equals(AppConstants.ResponseCodes.LOGIN_VALUE_ACCOUNT_TYPE_STUDENT)) {
                                startActivity(new Intent(LoginActivity.this, StudentHomeActivity.class));
                            }else{
                                startActivity(new Intent(LoginActivity.this, ParentHomeActivity.class));
                            }
                            finish();
                        }else{
                            if (response.body().getStatus().equals(AppConstants.ResponseCodes.SOMETHING_WENT_WRONG)) {
                                Toast.makeText(LoginActivity.this, AppConstants.ResponseCodes.SOMETHING_WENT_WRONG, Toast.LENGTH_LONG).show();
                            }else{
                                Toast.makeText(LoginActivity.this, "Either Email Or Password Is Wrong", Toast.LENGTH_LONG).show();
                            }
                        }
                    }

                    @Override
                    public void onFailure(Call<LoginJModel> call, Throwable t) {
                        Toast.makeText(LoginActivity.this, "Something Went Wrong", Toast.LENGTH_SHORT).show();
                        Log.d(TAG, "onFailure: " + t.getLocalizedMessage());
                    }
                });

            }else{
                Toast.makeText(this,"Email Or Password Cannot Be Empty",Toast.LENGTH_SHORT).show();
            }
        }else{
            Toast.makeText(this,"No Internet Connection",Toast.LENGTH_SHORT).show();
        }
    }

    private void putValuesToSharedPrefs(LoginJModel loginJModel, String studentEmail) {
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putBoolean(AppConstants.SharedPrefs.ALREADY_LOGGEN_IN, true);
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_STATUS
                , loginJModel.getStatus());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_ACCOUNT_TYPE
                , loginJModel.getAccountType());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_ADDRESS
                , loginJModel.getAddress());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_BRANCH
                , loginJModel.getBranch());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_GENDER
                , loginJModel.getGender());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_MOBILE_NO
                , loginJModel.getMobileNo());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_EMAIL
                , loginJModel.getParentEmail());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_EMAIL
                , studentEmail);
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_FNAME
                , loginJModel.getParentFname());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_PARENT_LNAME
                , loginJModel.getParentLname());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_FNAME
                , loginJModel.getStudentFname());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_STUDENT_LNAME
                , loginJModel.getStudentLname());
        editor.putString(AppConstants.ResponseCodes.LOGIN_KEY_UID
                , loginJModel.getUid());
        editor.commit();
        editor = null;
    }
}
