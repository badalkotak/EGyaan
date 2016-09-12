package com.egyaan.model;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Aditya Thakker (Github: @adityathakker) on 28/4/16.
 */
public class LoginJModel {
    @SerializedName("status")
    private String status;
    @SerializedName("message")
    private String message;
    @SerializedName("uid")
    private String uid;
    @SerializedName("accountType")
    private String accountType;
    @SerializedName("student_fname")
    private String studentFname;
    @SerializedName("student_lname")
    private String studentLname;
    @SerializedName("parent_fname")
    private String parentFname;
    @SerializedName("parent_lname")
    private String parentLname;
    @SerializedName("parent_email")
    private String parentEmail;
    @SerializedName("mobile_no")
    private String mobileNo;
    @SerializedName("address")
    private String address;
    @SerializedName("branch")
    private String branch;
    @SerializedName("gender")
    private String gender;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public String getUid() {
        return uid;
    }

    public void setUid(String uid) {
        this.uid = uid;
    }

    public String getAccountType() {
        return accountType;
    }

    public void setAccountType(String accountType) {
        this.accountType = accountType;
    }

    public String getStudentFname() {
        return studentFname;
    }

    public void setStudentFname(String studentFname) {
        this.studentFname = studentFname;
    }

    public String getStudentLname() {
        return studentLname;
    }

    public void setStudentLname(String studentLname) {
        this.studentLname = studentLname;
    }

    public String getParentFname() {
        return parentFname;
    }

    public void setParentFname(String parentFname) {
        this.parentFname = parentFname;
    }

    public String getParentLname() {
        return parentLname;
    }

    public void setParentLname(String parentLname) {
        this.parentLname = parentLname;
    }

    public String getParentEmail() {
        return parentEmail;
    }

    public void setParentEmail(String parentEmail) {
        this.parentEmail = parentEmail;
    }

    public String getMobileNo() {
        return mobileNo;
    }

    public void setMobileNo(String mobileNo) {
        this.mobileNo = mobileNo;
    }

    public String getAddress() {
        return address;
    }

    public void setAddress(String address) {
        this.address = address;
    }

    public String getBranch() {
        return branch;
    }

    public void setBranch(String branch) {
        this.branch = branch;
    }

    public String getGender() {
        return gender;
    }

    public void setGender(String gender) {
        this.gender = gender;
    }
}
