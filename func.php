<?php
function connectDB()
{
    return mysqli_connect("localhost", "user_20160705", "12345", "webp_20160705");
}